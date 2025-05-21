<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'building_number' => 'nullable|string|max:10',
        ]);

        $user->update($validated);

        return redirect()->route('profile.show')->with('success', 'Profil mis à jour avec succès');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Le mot de passe actuel est incorrect');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Mot de passe mis à jour avec succès');
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'password' => ['required'],
        ]);
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['userDeletion' => ['Le mot de passe est incorrect.']]);
        }
        Auth::logout();
        $user->delete();
        return redirect('/')->with('success', 'Votre compte a été supprimé avec succès.');
    }
}