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

        if(request('product'))
        {
            $product = Product::firstWhere('slug', request('product'));
            $title .= ' in ' . $product->name;
        }

        if(request('category'))
        {
            $category = Category::firstWhere('slug', request('category'));
            $title .= ' in ' . $category->name;
        }

        if(request('author'))
        {
            $author = User::firstWhere('username', request('author'));
            $title .= ' by ' . $author->name;
        }

        return view('designs', [
            'title' => $title,
            'designs' => Design::latest()->filter(request(['search', 'product', 'category', 'author']))->paginate(7)->withQueryString()
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
