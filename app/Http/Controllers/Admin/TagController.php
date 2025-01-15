<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    // Exibe a lista de tags
    public function index()
    {
        $tags = Tag::all(); // Recupera todas as tags
        return view('admin.tags.index', compact('tags'));
    }

    // Armazena uma nova tag
    public function store(Request $request)
    {
        $request->validate([
            'tag_name' => 'required|string|max:255',
        ]);

        Tag::create([
            'tag_name' => $request->input('tag_name'),
        ]);

        return redirect()->route('admin.tags')->with('success', 'Tag adicionada com sucesso!');
    }

    // Exclui uma tag
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('admin.tags')->with('success', 'Tag removida com sucesso!');
    }
}
