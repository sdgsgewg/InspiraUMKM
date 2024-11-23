<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Design;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\DesignReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DesignController extends Controller
{
    public function index()
    {
        $title = 'All Designs';
        $designs = Design::latest()->get();

        // Group designs by product and category for display
        $designsByProduct = $designs->groupBy('product_id')->map(function ($productDesigns) {
            return $productDesigns->groupBy('category_id');
        });

        $soldQuantities = DB::table('transaction_designs')
        ->select('design_id', DB::raw('SUM(quantity) as sold_quantity'))
        ->groupBy('design_id')
        ->pluck('sold_quantity', 'design_id'); // key: design_id, value: sold_quantity

        return view('designs.designs', [
            'title' => $title,
            'designsByProduct' => $designsByProduct,
            'products' => Product::all(),
            'categories' => Category::all(),
            'sellers' => User::has('designs')->get(),
            'user' => Auth::user(),
            'soldQuantities' => $soldQuantities,
        ]);
    }

    public function filter(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'search' => 'nullable|string',
            'product' => 'nullable|string',
            'category' => 'nullable|string',
            'min_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
            'rating' => 'nullable|numeric|min:0|max:5',
            'seller' => 'nullable|string',
        ]);
    
        $title = 'All Designs';
        $query = Design::latest();
    
        // Apply filters to the query
        $filteredQuery = $this->applyFilters($query, $title);
    
        if ($request->ajax()) {
            $filteredDesigns = $filteredQuery->get(); // Get all designs (no pagination)
            return response()->json([
                'html' => view('partials._designs', compact('filteredDesigns'))->render()
            ]);
        }
    
        // For regular requests, paginate the designs
        $filteredDesigns = $filteredQuery->paginate(12)->appends($request->query());
    
        $soldQuantities = DB::table('transaction_designs')
            ->select('design_id', DB::raw('SUM(quantity) as sold_quantity'))
            ->groupBy('design_id')
            ->pluck('sold_quantity', 'design_id');
    
        return view('designs.designFiltered', [
            'title' => $title,
            'filteredDesigns' => $filteredDesigns,
            'products' => Product::all(),
            'categories' => Category::all(),
            'sellers' => User::has('designs')->get(),
            'user' => Auth::user(),
            'soldQuantities' => $soldQuantities,
        ]);
    }
    

    protected function applyFilters($query, &$title)
    {
        // Filter by search query
        if (request('search')) {
            $title .= ' for "' . request('search') . '"';
            $query->where('title', 'like', '%' . request('search') . '%');
        }

        // Filter by product
        $product = null;
        if (request('product')) {
            $product = Product::firstWhere('slug', request('product'));
            if ($product) {
                $title .= ' in ' . $product->name;
                $query->where('product_id', $product->id);
            }
        }

        if (request('category')) {
            $categories = is_array(request('category')) ? request('category') : explode(',', request('category'));
        
            $categories = Category::whereIn('slug', $categories)->get();
            if ($categories->isNotEmpty()) {
                $title .= ' in ' . $categories->pluck('name')->implode(', ');
                $query->whereHas('category', function ($q) use ($categories) {
                    $q->whereIn('categories.id', $categories->pluck('id'));
                });
            }
        }
        
        if (request('min_price') || request('max_price')) {
            $minPrice = request('min_price');
            $maxPrice = request('max_price');

            if ($minPrice !== null) {
                $query->where('price', '>=', $minPrice);
            }
            if ($maxPrice !== null) {
                $query->where('price', '<=', $maxPrice);
            }
        }

        $rating = request('rating');
        if ($rating) {
            $query->join('design_reviews', 'designs.id', '=', 'design_reviews.design_id')
                ->select('designs.*', DB::raw('AVG(design_reviews.rating) as avg_rating'))
                ->groupBy('designs.id')
                ->having('avg_rating', '>=', $rating);
        }

        if (request('seller')) {
            $seller = User::firstWhere('username', request('seller'));
            if ($seller) {
                $title .= ' by ' . $seller->name;
                $query->where('user_id', $seller->id);
            }
        }

        return $query;
    }

    public function getCategoriesByProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            return response()->json($product->categories);
        }

        return response()->json([]);
    }

    public function showDesignProduct(Product $product) 
    {
        $product->load(['designs' => function ($query) {
            $query->latest();
        }, 'designs.category']);
    
        return view('designs.design-product', [
            'title' => $product->name . ' Designs',
            'product' => $product,
            'products' => Product::all(),
            'categories' => Category::all(),
            'sellers' => User::has('designs')->get(),
            'user' => Auth::user()
        ]);
    }    

    public function showDesignCategory(Category $category) 
    {
        $designs = $category->designs()->paginate(12);

        return view('designs.design-category', [
            'title' => $category->name . ' Designs',
            'category' => $category,
            'designs' => $designs,
            'products' => Product::all(),
            'categories' => Category::all(),
            'sellers' => User::has('designs')->get(),
            'user' => Auth::user()
        ]);
    }

    public function show(Design $design)
    {
        $soldQuantity = DB::table('transaction_designs')
        ->where('design_id', $design->id)
        ->sum('quantity');

        $comments = Comment::where('design_id', $design->id)->get();

        return view('designs.design', [
            'title' => 'Single Design',
            'design' => $design,
            'comments' => $comments,
            'soldQuantity' => $soldQuantity,
        ]);
    }

    public function showSeller(User $seller)
    {
        $title = 'Seller Page';
        $designs = $seller->designs()
        ->select('designs.*')
        ->selectRaw('IFNULL(AVG(design_reviews.rating), 0) as avg_rating') // Default to 0 for designs with no reviews
        ->leftJoin('design_reviews', 'designs.id', '=', 'design_reviews.design_id')
        ->groupBy('designs.id')
        ->orderByDesc('avg_rating')
        ->paginate(12);

        $averageRating = $seller->designs->map(function ($design) {
            return $design->reviews->avg('rating');
        })->avg();

        $averageRating = number_format($averageRating, 2) ?: 0.00;

        return view('designs.seller', [
            'title' => $title,
            'seller' => $seller,
            'designs' => $designs,
            'averageRating' => $averageRating
        ]);
    }

    public function sendFeedback(Request $request)
    {
        $validated = $request->validate([
            'design_id' => 'required|exists:designs,id',
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:255',
        ]);

        DesignReview::Create(
            [
                'user_id' => Auth::user()->id,
                'design_id' => $validated['design_id'],
                'rating' => $validated['rating'],
                'feedback' => $validated['feedback'],
                'isRated' => true,
            ]
        );

        return redirect()->back()->with('success', 'Feedback submitted successfully.');
    }
}
