<?php

namespace App\Http\Controllers;

use App\Models\Design;

class DesignController extends Controller
{
    public function index()
    {
        $title = 'All Designs';

        // if(request('category'))
        // {
        //     $category = Category::firstWhere('slug', request('category'));
        //     $title .= ' in ' . $category->name;
        // }

        // if(request('author'))
        // {
        //     $author = User::firstWhere('username', request('author'));
        //     $title .= ' by ' . $author->name;
        // }

        return view('designs', [
            'title' => $title
            // 'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Design $design)
    {
        return view('design', [
            'title' => 'Single Design',
            'post' => $design
        ]);
    }
}
