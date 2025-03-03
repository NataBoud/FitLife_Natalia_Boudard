<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Affiche une liste de tous les cours de fitness.
     */
    public function index()
    {
        $cours = Cours::orderBy('created_at', 'desc')->paginate(3);
        return view('home', compact('cours'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau cours de fitness.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Enregistre un nouveau cours de fitness dans la base de données.
     */
    public function store(Request $request)
    {

    }

    /**
     * Affiche les détails d'un cours de fitness spécifique.
     */
    public function show($id)
    {
        $cours = Cours::with('horaires.coach')->findOrFail($id);
        return view('cours.show', compact('cours'));
    }

    /**
     * Affiche le formulaire d'édition d'un cours de fitness existant.
     */
    public function edit(Cours $cours)
    {
        // return view('fitness_classes.edit', compact('fitnessClass'));
    }

    /**
     * Met à jour un cours de fitness existant dans la base de données.
     */
    public function update(Request $request, Cours $cours)
    {
        // $validated = $request->validate([
        //     'class_name' => 'required|max:255',
        //     'description' => 'nullable|string',
        // ]);

        // $fitnessClass->update($validated);

        // return redirect()->route('fitness_classes.show', $fitnessClass)->with('success', 'Cours de fitness mis à jour avec succès.');
    }

    /**
     * Supprime un cours de fitness de la base de données.
     */
    public function destroy(Cours $cours)
    {
        // $fitnessClass->delete();

        // return redirect()->route('fitness_classes.index')->with('success', 'Cours de fitness supprimé avec succès.');
    }
}
