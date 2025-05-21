<?php

namespace App\Http\Controllers;

use App\Models\Resolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResolutionController extends Controller
{
    public function index()
    {
        $resolutions = Resolution::orderBy('vote_start_date', 'desc')->get();
        return view('resolutions.index', compact('resolutions'));
    }

    public function adminIndex()
    {
        $resolutions = Resolution::orderBy('vote_start_date', 'desc')->get();
        return view('admin.resolutions.index', compact('resolutions'));
    }

    public function create()
    {
        return view('admin.resolutions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'vote_start_date' => 'required|date',
            'vote_end_date' => 'required|date|after:vote_start_date',
        ]);

        Resolution::create($validated);

        return redirect()->route('admin.resolutions')->with('success', 'Résolution créée avec succès');
    }

    public function edit(Resolution $resolution)
    {
        return view('admin.resolutions.edit', compact('resolution'));
    }

    public function update(Request $request, Resolution $resolution)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'vote_start_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($resolution) {
                    if ($resolution->votes()->exists() && $value != $resolution->vote_start_date) {
                        $fail('La date de début ne peut pas être modifiée car des votes existent déjà.');
                    }
                }
            ],
            'vote_end_date' => 'required|date|after:vote_start_date',
            'status' => 'required|in:pending,approved,rejected,abstained',
        ]);

        $resolution->update($validated);

        return redirect()->route('admin.resolutions')
            ->with('success', 'Résolution mise à jour avec succès');
    }

    public function destroy(Resolution $resolution)
    {
        DB::beginTransaction();

        try {
            // Supprime d'abord tous les votes associés
            $resolution->votes()->delete();
            
            // Puis supprime la résolution
            $resolution->delete();

            DB::commit();

            return redirect()->route('admin.resolutions')
                ->with('success', 'Résolution et votes associés supprimés avec succès');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
}