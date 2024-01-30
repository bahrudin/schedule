<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $articles = BlogPost::query()->where('is_publish', 1)->latest()->paginate(5);
        visitor()->visit();
        return view('frontend.home', ['articles' => $articles, 'title'=>$title]);
    }

    public function show($slug)
    {
        $article = BlogPost::query()->where('blog_posts.slug', $slug)->first();
        $title = 'Article '.$article->category->name;
        $article->visit()->withIP()->withSession()->withUser();

        if (empty($article)){
            return route('blogs.home');
        }
        return view('frontend.show', ['article' => $article, 'title'=>$title]);
    }
}
