<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatiereRequest;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MatieresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.matieres.index', [
            'matieres' => Matiere::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->showForm();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $matiere): View
    {
        return $this->showForm($matiere);
    }

    protected function showForm(Matiere $matiere = new Matiere): View
    {
        return view('admin.matieres.form', [
            'matiere' => $matiere,
            'matieres' => Matiere::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatiereRequest $request): RedirectResponse
    {
        return $this->save($request->validated());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatiereRequest $request, Matiere $matiere): RedirectResponse
    {
        return $this->save($request->validated(), $matiere);
    }

    protected function save(array $data, Matiere $matiere = null): RedirectResponse
    {
        $matiere = Matiere::updateOrCreate(['id' => $matiere?->id], $data);

        return redirect()->route('admin.matieres.index')->withStatus($matiere->wasRecentlyCreated ? 'Matière publie !' : 'Matière mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $matiere)
    {
        $matiere->delete();

        return redirect()->route('admin.matieres.index')->withStatus('Matière supprimée !');
    }
}
