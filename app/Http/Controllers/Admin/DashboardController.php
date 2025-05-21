<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Meeting;
use App\Models\Resolution;
use App\Models\Vote;
use App\Models\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $meetingsCount = Meeting::count();
        $resolutionsCount = Resolution::count();
        $votesCount = Vote::count();
        $recentVotes = Resolution::withCount('votes')
            ->whereHas('votes')
            ->orderByDesc('vote_end_date')
            ->limit(3)
            ->get();
        
        return view('admin.dashboard', compact(
            'usersCount',
            'meetingsCount',
            'resolutionsCount',
            'votesCount',
            'recentVotes'
        ));
    }

    public function users()
    {
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users'));
    }

    public function editUser(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role_id' => 'required|exists:roles,id',
            'building_number' => 'nullable|string|max:10',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé avec succès');
    }
}