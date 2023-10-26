<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BackofficeArticleController extends Controller
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
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->with(['tags:name'])
            ->when($request->filled('title'), function (Builder $q) use ($request) {
                $q->where('articles.title', 'like', '%' . $request->input('title') . '%');
            })
            ->when($request->filled('category_id'), function (Builder $q) use ($request) {
                $q->whereRelation('category', 'id', $request->input('category_id'));
            })
            ->when($request->filled('tag_id'), function (Builder $q) use ($request) {
                $q->whereRelation('tags', 'tag_id', $request->input('tag_id'));
            })
            ->orderByDesc('articles.created_at')
            ->paginate(10);

        $data             = $this->getRelatedData();
        $data['articles'] = $articles;

        return view('backoffice.article.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data = $this->getRelatedData();
        return view('backoffice.article.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $article = Article::create($request->validated());
            $article->tags()->attach($request->tags);
            if ($request->hasFile('images')) {
                $images = $this->uploadImages($request, $article);
                $article->images()->createMany($images);
            }
        });

        return $this->redirect_success_store('backoffice.articles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View
    {
        $data            = $this->getRelatedData();
        $data['article'] = $article;

        return view('backoffice.article.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        DB::transaction(function () use ($request, $article) {
            $article->update($request->validated());
            $article->tags()->sync($request->tags);
            if ($request->hasFile('images')) {
                $images = $this->uploadImages($request, $article);
                $article->images()->createMany($images);
            }
        });

        return $this->redirect_success_update('backoffice.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        DB::transaction(function () use ($article) {
            Storage::deleteDirectory('public/article/'.$article->id);
            $article->tags()->detach();
            $article->delete();
        });

        return $this->redirect_success_delete('backoffice.articles.index');
    }

    /**
     * Remove the specified image from storage.
     */
    public function removeImage(Image $image): RedirectResponse
    {
        Storage::disk('public')->delete('article/' . $image->article_id . '/' . $image->url);
        $article = $image->article;
        $image->delete();

        return redirect()->route('backoffice.articles.edit', ['article' => $article])
            ->with('success', __('Successfully deleted'));
    }

    /**
     * Retrieve related data for use in create and edit methods.
     */
    private function getRelatedData(): array
    {
        return [
            'categories' => Category::all(['id', 'name'])->sortBy('name'),
            'tags'       => Tag::all(['id', 'name'])->sortBy('name'),
        ];
    }

    /**
     * Upload images related to an article and return their URLs.
     */
    private function uploadImages(Request $request, Article $article): array
    {
        $images = [];

        foreach ($request->file('images') as $image) {
            $image->store('article/' . $article->id, 'public');
            $images[] = ['url' => $image->hashName()];
        }

        return $images;
    }

}
