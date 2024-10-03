<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Design;
use App\Models\Category;
use App\Models\Product;

class DesignController extends Controller
{
    public function index()
    {
        $title = 'All Designs';

        // Handle search query
        if (request('search')) {
            $title .= ' for "' . request('search') . '"';
            return view('designsFiltered', [
                'title' => $title,
                'designs' => Design::latest()->filter(request(['search', 'product', 'category', 'author']))->paginate(7)->withQueryString()
            ]);
        }

        // Handle product filter
        if (request('product')) {
            $product = Product::firstWhere('slug', request('product'));
            $title .= ' in ' . $product->name;
            return view('designsFiltered', [
                'title' => $title,
                'designs' => Design::latest()->filter(request(['search', 'product', 'category', 'author']))->paginate(7)->withQueryString()
            ]);
        }

        // Handle category filter
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title .= ' in ' . $category->name;
            return view('designsFiltered', [
                'title' => $title,
                'designs' => Design::latest()->filter(request(['search', 'product', 'category', 'author']))->paginate(7)->withQueryString()
            ]);
        }

        // Handle author filter
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title .= ' by ' . $author->name;
            return view('designsFiltered', [
                'title' => $title,
                'designs' => Design::latest()->filter(request(['search', 'product', 'category', 'author']))->paginate(7)->withQueryString()
            ]);
        }

        // Default behavior if no filters or search query are present
        return view('designs', [
            'title' => $title,
            'designs' => Design::latest()->get(),
            'products' => Product::all()
        ]);
    }

    public function show(Design $design)
    {
        return view('design', [
            'title' => 'Single Design',
            'design' => $design
        ]);
    }
}
