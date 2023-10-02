<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articles = Article::sortable()
            ->select([
                'articles.id',
                'articles.title',
                'categories.name as category_name',
            ])
            ->join('categories','articles.category_id','=','categories.id')
            ->with(['tags:name'])
            ->when($request->filled('title'), function (Builder $q) use ($request) {
                 $q->where('articles.title', 'like', '%' . $request->input('title') . '%');
            })
            ->when($request->filled('category_id'), function (Builder $q) use ($request){
                $q->whereRelation('category', 'id',  $request->input('category_id'));
            })
            ->when($request->filled('tag_id'), function (Builder $q) use ($request){
                $q->whereRelation('tags','tag_id',$request->input('tag_id'));
            })
            ->paginate(10);

        $data = $this->getRelatedData();
        $data['articles'] = $articles;

        return view('article.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $articles = Article::sortable()
            ->select(['id', 'title',])
            ->with(['category:name','tags:name'])
            ->paginate(10);

        return view('article.index', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    /**
     * Retrieve related data for use in create and edit methods.
     */
    private function getRelatedData(): array
    {
        return [
            'categories' => Category::all(['id', 'name'])->sortBy('name'),
            'tags'       => Tag::all(['id', 'name'])->sortByDesc('name'),
        ];
    }

}
