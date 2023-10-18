<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
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
    public function create(): View
    {
        $data = $this->getRelatedData();
        return view('article.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        DB::transaction(function() use ( $request) {
            $article = Article::create($request->validated());
            $article->tags()->attach($request->tags);

            if ($request->hasFile('images')) {

                foreach($request->file('images') as $image){
                    $image->storeAs('article/' . $article->id, 'public');
                    $images[] = ['url' => $image->hashName()];
                }

                $article->images()->createMany($images);
            }

        });

        return $this->redirect_success_store('articles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View
    {
        $data = $this->getRelatedData();
        $data['article'] = $article;

        return view('article.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        DB::transaction(function() use ( $request, $article) {
            $article->update($request->validated());
            $article->tags()->sync($request->tags);
        });

        return $this->redirect_success_update('articles.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        DB::transaction(function() use ( $article) {
            $article->tags()->detach();
            $article->delete();
        });

        return $this->redirect_success_delete('articles.index');
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
