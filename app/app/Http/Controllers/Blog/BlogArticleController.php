<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $articles = Article::sortable()
            ->select([
                'articles.id',
                'articles.title',
                'articles.created_at',
                'articles.description',
                'categories.name as category_name',
            ])
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->withFirstImageUrl()
            ->orderByDesc('articles.created_at')
            ->paginate(10);

        $categories = Category::all(['id', 'name'])->sortBy('name');

        return view('blog.article.index', compact('articles','categories'));
    }

}
