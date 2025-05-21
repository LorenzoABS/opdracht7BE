<?php

namespace App\Http\Controllers;

use App\Models\Instructeur;

class InstructeurController extends Controller
{
    public function index()
    {
        $instructeurs = Instructeur::with('voertuigen')->orderBy('aantal_sterren', 'desc')->get(); // Sort by stars descending
        return view('welcome', compact('instructeurs')); // Geef de variabele door aan de view
    }

    public function show($id)
    {
        $instructeur = Instructeur::with(['voertuigen.type_voertuig'])->findOrFail($id);

        // Sorteer voertuigen op rijbewijscategorie (alfabetisch, A bovenaan)
        $voertuigen = $instructeur->voertuigen->sortBy(function($voertuig) {
            return $voertuig->type_voertuig->rijbewijscategorie ?? 'ZZZ';
        }, SORT_NATURAL|SORT_FLAG_CASE);

        // Zet de gesorteerde voertuigen terug op het model (voor de view)
        $instructeur->setRelation('voertuigen', $voertuigen);

        return view('instructeur.details', compact('instructeur')); // Pass data to the details view
    }
}