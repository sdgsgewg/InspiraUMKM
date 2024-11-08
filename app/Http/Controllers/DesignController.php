<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Design;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DesignController extends Controller
{
    public function index()
    {
        $title = 'All Designs';
        $query = Design::latest();
        $filteredQuery = $this->applyFilters($query, $title);
        $isFiltered = request()->has('search') || request()->has('product') || request()->has('category') || request()->has('seller');
        $designs = $filteredQuery->get();

        // Group designs by product and category for display
        $designsByProduct = $designs->groupBy('product_id')->map(function ($productDesigns) {
            return $productDesigns->groupBy('category_id');
        });

        // If a product filter is applied, only fetch categories for that product
        $productFilter = request('product');
        if ($productFilter) {
            $product = Product::firstWhere('slug', $productFilter);
            $categories = $product ? $product->categories : collect();  // Categories linked to filtered product
        } else {
            $categories = Category::all();  // Default to all categories if no product filter is applied
        }

        $viewName = $isFiltered ? 'designs.designFiltered' : 'designs.designs';

        return view($viewName, [
            'title' => $title,
            'designsByProduct' => $designsByProduct,
            'products' => Product::all(),
            'categories' => $categories,
            'sellers' => User::has('designs')->get(),
            'user' => Auth::user()
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

        // Filter by category, ensuring the category belongs to the selected product (if any)
        if (request('category')) {
            // Ensure category is an array even if only one category is selected
            $categories = is_array(request('category')) ? request('category') : explode(',', request('category'));
        
            $categories = Category::whereIn('slug', $categories)->get();
            if ($categories->isNotEmpty()) {
                $title .= ' in ' . $categories->pluck('name')->implode(', ');
                $query->whereHas('category', function ($q) use ($categories) {
                    // Specify the correct relationship and columns
                    $q->whereIn('categories.id', $categories->pluck('id'));  // Use 'categories.id' explicitly
                });
            }
        }              

        // Filter by seller
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

    public function show(Design $design)
    {
        return view('designs.design', [
            'title' => 'Single Design',
            'design' => $design
        ]);
    }
}
