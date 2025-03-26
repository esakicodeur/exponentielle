<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.tags.index', [
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return $this->showForm();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag): View
    {
        return $this->showForm($tag);
    }


    protected function showForm(Tag $tag = new Tag): View
    {
        return view('admin.tags.form', [
            'tag' => $tag,
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request): RedirectResponse
    {
        return $this->save($request->validated());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag): RedirectResponse
    {
        return $this->save($request->validated(), $tag);
    }

    protected function save(array $data, Tag $tag = null): RedirectResponse
    {
        $tag = Tag::updateOrCreate(['id' => $tag?->id], $data);

        return redirect()->route('admin.tags.index')->withStatus($tag->wasRecentlyCreated ? 'tag publié !' : 'tag mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->withStatus('tag supprimé !');
    }
}
