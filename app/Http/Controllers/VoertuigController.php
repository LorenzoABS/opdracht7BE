<?php

namespace App\Http\Controllers;

use App\Models\Voertuig;
use App\Models\TypeVoertuig;
use App\Models\Instructeur;
use Illuminate\Http\Request;

class VoertuigController extends Controller
{
    public function edit($id)
    {
        $voertuig = Voertuig::with('type_voertuig', 'instructeurs')->findOrFail($id);
        $typeVoertuigen = TypeVoertuig::all();
        $instructeurs = Instructeur::all();
        $huidigeInstructeur = $voertuig->instructeurs()->first();
        return view('voertuigen.edit', compact('voertuig', 'typeVoertuigen', 'instructeurs', 'huidigeInstructeur'));
    }

    public function update(Request $request, $id)
    {
        $voertuig = Voertuig::findOrFail($id);

        // Sla het oude instructeur-id op
        $oudeInstructeur = $voertuig->instructeurs()->first();

        $voertuig->update($request->only(['type_voertuig_id', 'type', 'kenteken', 'bouwjaar', 'brandstof']));

        // Instructeur wijzigen (detach huidige, attach nieuwe) met datum_toekenning
        if ($request->has('instructeur_id')) {
            $voertuig->instructeurs()->sync([
                $request->input('instructeur_id') => ['datum_toekenning' => now()->toDateString()]
            ]);
        }

        // Redirect naar de oude instructeur (waar het voertuig niet meer staat)
        if ($oudeInstructeur) {
            return redirect()->route('instructeurs.show', $oudeInstructeur->id)
                ->with('success', 'Voertuig succesvol bijgewerkt.');
        }
        return redirect('/')->with('success', 'Voertuig succesvol bijgewerkt.');
    }

    public function available(Request $request, $instructeurId)
    {
        $instructeur = \App\Models\Instructeur::findOrFail($instructeurId);
        $voertuigen = \App\Models\Voertuig::with('type_voertuig', 'instructeurs')->get();
        return view('voertuigen.available', compact('instructeur', 'voertuigen'));
    }

    public function assign(Request $request, $instructeurId, $voertuigId)
    {
        $instructeur = \App\Models\Instructeur::findOrFail($instructeurId);
        $voertuig = \App\Models\Voertuig::findOrFail($voertuigId);

        // Koppel voertuig aan instructeur met datum_toekenning
        $instructeur->voertuigen()->syncWithoutDetaching([
            $voertuig->id => ['datum_toekenning' => now()->toDateString()]
        ]);

        return redirect()->route('instructeurs.show', $instructeur->id)
            ->with('success', 'Voertuig succesvol toegevoegd aan instructeur.');
    }
}
