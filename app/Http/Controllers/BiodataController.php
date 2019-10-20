<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags      =  Tag::all();
        $categories = Category::all();
        $posts = Post::latest()->approved()->published()->take(6)->get();
        return view('biodata',compact('categories','posts','tags'));
    }
}