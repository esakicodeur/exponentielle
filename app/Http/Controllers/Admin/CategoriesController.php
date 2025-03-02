<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Category::all(),
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
    public function edit(Category $category): View
    {
        return $this->showForm($category);
    }


    protected function showForm(Category $category = new Category): View
    {
        return view('admin.categories.form', [
            'category' => $category,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        return $this->save($request->validated());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        return $this->save($request->validated(), $category);
    }

    protected function save(array $data, Category $category = null): RedirectResponse
    {
        $category = Category::updateOrCreate(['id' => $category?->id], $data);

        return redirect()->route('admin.categories.index')->withStatus($category->wasRecentlyCreated ? 'category publie !' : 'category mis a jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->withStatus('categorie supprimee !');
    }
}
