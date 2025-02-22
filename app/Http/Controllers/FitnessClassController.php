<?php

namespace App\Http\Controllers;

use App\Models\FitnessClass;
use Illuminate\Http\Request;

class FitnessClassController extends Controller
{
    /**
     * Affiche une liste de tous les cours de fitness.
     */
    public function index()
    {
        $fitnessClasses = FitnessClass::orderBy('created_at', 'desc')->paginate(3);
        return view('home', compact('fitnessClasses'));
    }

    /**
     *  APRES AUTENTIFICATION DE L'UTILISATEUR
     */

    /**
     * Affiche le formulaire de création d'un nouveau cours de fitness.
     */
    public function create()
    {
        return view('fitness_classes.create');
    }

    /**
     * Enregistre un nouveau cours de fitness dans la base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        FitnessClass::create($validated);

        return redirect()->route('fitness_classes.index')->with('success', 'Cours de fitness créé avec succès.');
    }

    /**
     * Affiche les détails d'un cours de fitness spécifique.
     */
    public function show($id)
    {
        $fitnessClass = FitnessClass::findOrFail($id);
        return view('fitness_classes.show', compact('fitnessClass'));
    }

    /**
     * Affiche le formulaire d'édition d'un cours de fitness existant.
     */
    public function edit(FitnessClass $fitnessClass)
    {
        return view('fitness_classes.edit', compact('fitnessClass'));
    }

    /**
     * Met à jour un cours de fitness existant dans la base de données.
     */
    public function update(Request $request, FitnessClass $fitnessClass)
    {
        $validated = $request->validate([
            'class_name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        $fitnessClass->update($validated);

        return redirect()->route('fitness_classes.show', $fitnessClass)->with('success', 'Cours de fitness mis à jour avec succès.');
    }

    /**
     * Supprime un cours de fitness de la base de données.
     */
    public function destroy(FitnessClass $fitnessClass)
    {
        $fitnessClass->delete();

        return redirect()->route('fitness_classes.index')->with('success', 'Cours de fitness supprimé avec succès.');
    }
}
