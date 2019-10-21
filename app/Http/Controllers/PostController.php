<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function index()
    {
        $popular_posts = Post::withCount('comments')
                            ->withCount('favorite_to_users')
                            ->orderBy('view_count','desc')
                            ->orderBy('comments_count','desc')
                            ->orderBy('favorite_to_users_count','desc')
                            ->take(5)->get();
        $categories = Category::all();
         $tags      =  Tag::all();
        $posts = Post::latest()->approved()->published()->paginate(6);
        return view('posts',compact('posts','categories','tags','popular_posts'));
    }
    public function details($slug)
    {


        $post = Post::where('slug',$slug)->approved()->published()->first();
        $blog = Post::all();
          $tags      =  Tag::all();
         $categories = Category::all();

        $blogKey = 'blog_' . $post->id;

        if (!Session::has($blogKey)) {
            $post->increment('view_count');
            Session::put($blogKey,1);
        }
        $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
        return view('post',compact('tags','categories','blog','post','randomposts'));

    }

    public function postByCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->approved()->published()->get();
        return view('category',compact('category','posts'));
    }

    public function postByTag($slug)
    {
        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->posts()->approved()->published()->get();
        return view('tag',compact('tag','posts'));
    }
}
