<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class BlogArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
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

        $categories = $this->getCategories();
        $page_title = 'Blog';

        return view('blog.article.index', compact('articles', 'categories', 'page_title'));
    }

    /**
     * Display a listing of the resource.
     */
    public function byCategory(Category $category): View
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
            ->whereRelation('category', 'id', $category->id)
            ->orderByDesc('articles.created_at')
            ->paginate(10);

        $categories = $this->getCategories();
        $page_title = $category->name;

        return view('blog.article.index', compact('articles', 'categories', 'page_title'));
    }


    public function getCategories(): mixed
    {
        return Category::select(['id', 'name'])
            ->withCount('articles')
            ->get();
    }

}
