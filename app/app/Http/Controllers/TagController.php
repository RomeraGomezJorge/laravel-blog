<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdatetagRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $orderBy       = $request->input('order_by', 'id');
        $sortDirection = $request->input('direction', 'asc');

        $tags = Tag::sortable()
            ->select(['id', 'name'])
            ->orderBy($orderBy, $sortDirection)
            ->when($request->filled('name'), function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->input('name') . '%');
            })
            ->paginate(10);

        return view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request): RedirectResponse
    {
        Tag::create($request->validated());
        return redirect()->route('tags.index')->with('success', __('Successfully created'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag): View
    {
        return view('tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetagRequest $request, Tag $tag): RedirectResponse
    {
        $tag->update($request->validated());
        return redirect()->route('tags.index')->with('success', __('Successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return response()->redirectToRoute('tags.index')->with('success', __('Successfully deleted'));
    }
}
