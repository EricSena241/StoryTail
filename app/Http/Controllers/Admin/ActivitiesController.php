<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index()
{
    $activities = Activity::with('books')->get();
    return view('admin.activities.index', compact('activities'));
}

public function create()
{
    $books = \App\Models\Book::all();
    return view('admin.activities.create', compact('books'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'activity_description' => 'nullable|max:255',
        'books' => 'nullable|array',
    ]);

    $activity = Activity::create($request->only(['title', 'activity_description']));

    // Relaciona os livros com a atividade
    if ($request->has('books')) {
        $activity->books()->sync($request->books);
    }

    return redirect()->route('admin.activities.index')->with('success', 'Activity created successfully!');
}
public function destroy($id)
{
    $activity = Activity::findOrFail($id);

    // Remove a atividade
    $activity->delete();

    // Redireciona com uma mensagem de sucesso
    return redirect()->route('admin.activities.index')->with('success', 'Activity deleted successfully!');
}
}