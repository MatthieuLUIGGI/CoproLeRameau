<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::orderBy('date_time', 'desc')->get();
        return view('meetings.index', compact('meetings'));
    }

    public function adminIndex()
    {
        $meetings = Meeting::orderBy('date_time', 'desc')->get();
        return view('admin.meetings.index', compact('meetings'));
    }

    public function create()
    {
        return view('admin.meetings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        Meeting::create($validated);

        return redirect()->route('admin.meetings')->with('success', 'Réunion créée avec succès');
    }

    public function edit(Meeting $meeting)
    {
        return view('admin.meetings.edit', compact('meeting'));
    }

    public function update(Request $request, Meeting $meeting)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
            'status' => 'required|in:planned,completed,canceled',
        ]);

        $meeting->update($validated);

        return redirect()->route('admin.meetings')->with('success', 'Réunion mise à jour avec succès');
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('admin.meetings')->with('success', 'Réunion supprimée avec succès');
    }
}