<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class BlogArticleController extends Controller
{
    private const ARTICLE_PER_PAGE = 10;

    private function getArticlesQuery(): Builder
    {
        return Article::select([
                'articles.id',
                'articles.title',
                'articles.created_at',
                'articles.description',
                'categories.name as category_name',
            ])
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->withFirstImageUrl()
            ->orderByDesc('articles.created_at');
    }

    public function index(): View
    {
        $articles   = $this->getArticlesQuery()->paginate(self::ARTICLE_PER_PAGE);
        $categories = $this->getCategories();
        $page_title = 'Blog';

        return view('blog.article.index', compact('articles', 'categories', 'page_title'));
    }

    public function byCategory(Category $category): View
    {
        $articles = $this->getArticlesQuery()
            ->whereRelation('category', 'id', $category->id)
            ->paginate(self::ARTICLE_PER_PAGE);

        $categories = $this->getCategories();
        $page_title = $category->name;

        return view('blog.article.index', compact('articles', 'categories', 'page_title'));
    }

    public function byTag(Tag $tag): View
    {
        $articles = $this->getArticlesQuery()
            ->whereRelation('tags', 'tag_id', $tag->id)
            ->paginate(self::ARTICLE_PER_PAGE);

        $categories = $this->getCategories();
        $page_title = $tag->name;

        return view('blog.article.index', compact('articles', 'categories', 'page_title'));
    }

    public function getCategories(): mixed
    {
        return Category::select(['id', 'name'])
            ->withCount('articles')
            ->get();
    }
}
