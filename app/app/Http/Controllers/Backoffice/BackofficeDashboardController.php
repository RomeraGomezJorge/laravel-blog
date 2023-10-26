<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class BackofficeDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $article_count  = Article::count('id');
        $category_count = Category::count('id');
        $tag_count      = Tag::count('id');

        return view('backoffice.dashboard', compact('article_count', 'category_count', 'tag_count'));
    }

}
