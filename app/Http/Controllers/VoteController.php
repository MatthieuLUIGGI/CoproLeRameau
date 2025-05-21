<?php

namespace App\Http\Controllers;

use App\Models\Resolution;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VoteController extends Controller
{
    public function index()
    {
        $resolutions = Resolution::where('vote_end_date', '>=', now())
            ->where('vote_start_date', '<=', now())
            ->orderBy('vote_end_date', 'asc')
            ->get();

        return view('votes.index', compact('resolutions'));
    }

    public function adminIndex()
    {
        $resolutions = Resolution::withCount('votes')
            ->orderBy('vote_end_date', 'desc')
            ->get();

        return view('admin.votes.index', compact('resolutions'));
    }

    public function vote(Request $request, $resolutionId)
    {
        $resolution = Resolution::findOrFail($resolutionId);
        $user = auth()->user();
    
        // Vérifier si l'utilisateur a déjà voté
        if ($user->hasVotedForResolution($resolutionId)) {
            return back()->with('error', 'Vous avez déjà voté pour cette résolution.');
        }
    
        if (!$resolution->isVotingOpen()) {
            return back()->with('error', 'La période de vote est terminée.');
        }
    
        $validated = $request->validate([
            'vote' => 'required|in:yes,no,abstain',
        ]);
    
        try {
            $vote = Vote::create([
                'user_id' => $user->id,
                'resolution_id' => $resolution->id,
                'vote' => $validated['vote']
            ]);
    
            return back()->with('success', 'Votre vote a été enregistré avec succès.');
    
        } catch (\Exception $e) {
            logger()->error('Erreur vote', ['error' => $e->getMessage()]);
            return back()->with('error', 'Une erreur est survenue.');
        }
    }
    
    public function results($resolutionId)
    {
        $resolution = Resolution::findOrFail($resolutionId);
        $user = auth()->user();
    
        // Seuls les admins peuvent voir les résultats avant la fin
        if (!$user->isAdmin() && $resolution->isVotingOpen()) {
            abort(403, 'Les résultats ne seront disponibles qu\'après la fin du vote.');
        }
    
        $votes = $resolution->votes;
        $yesCount = $votes->where('vote', 'yes')->count();
        $noCount = $votes->where('vote', 'no')->count();
        $abstainCount = $votes->where('vote', 'abstain')->count();
        $totalVotes = $votes->count();
    
        return view('votes.results', compact(
            'resolution',
            'yesCount',
            'noCount',
            'abstainCount',
            'totalVotes'
        ));
    }
}