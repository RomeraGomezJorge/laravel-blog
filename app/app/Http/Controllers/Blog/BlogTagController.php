<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class BlogTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(): View
    {
        $tags = Tag::select([
            'tags.id',
            'tags.name',
        ])
            ->withCount('articles')
            ->paginate(50);

        $categories = $this->getCategories();
        $page_title = 'Tags';

        return view('blog.tag.index', compact('tags', 'categories', 'page_title'));
    }

    public function getCategories(): mixed
    {
        return Category::select(['id', 'name'])
            ->withCount('articles')
            ->get();
    }

}
