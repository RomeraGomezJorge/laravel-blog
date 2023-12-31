<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BackofficeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $categories = Category::sortable()
            ->when($request->filled('name'), function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->input('name') . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('backoffice.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backoffice.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());
        return $this->redirect_success_store('backoffice.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('backoffice.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());
        return $this->redirect_success_update('backoffice.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {

        if ($category->articles->isNotEmpty()) {
            return $this->redirect_with_error('backoffice.categories.index',__('Cannot delete, category has articles'));
        }

        $category->delete();
        return $this->redirect_success_delete('backoffice.categories.index');
    }
}
