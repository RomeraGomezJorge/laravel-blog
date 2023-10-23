<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $article_count = Article::count('id');
        $category_count = Category::count('id');
        $tag_count = Tag::count('id');

        return view('dashboard', compact('article_count','category_count','tag_count'));
    }

}
