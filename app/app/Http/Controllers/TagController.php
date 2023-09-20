<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretagRequest;
use App\Http\Requests\UpdatetagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $orderBy       = $request->input('order_by', 'id');
        $sortDirection = $request->input('direction', 'asc');

        $tags =  DB::table('tags')
            ->select(['id','name'])
            ->orderBy($orderBy,$sortDirection)
            ->when($request->filled('name'),function ($q) use ($request){
                return $q->where('name', 'like', '%' . $request->input('name') . '%');
            })
            ->paginate(10);

        return response()->view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetagRequest $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->redirectToRoute('tag.index')->with('message', trans('main.delete_success'));
    }
}
