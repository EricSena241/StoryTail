<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUserRead;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            abort(404, 'Book not found');
        }

        $ageGroup = $book->ageGroup;

        $currentRating = BookUserRead::where('id_book', $id)
        ->where('id_user', auth()->id())
        ->value('rating');

        return view('books', compact('book', 'ageGroup', 'currentRating'));
    }


    public function rate(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        // Tenta encontrar ou criar um registro para o usuário e o livro
        $bookUserRead = BookUserRead::updateOrCreate(
            [
                'id_book' => $id,
                'id_user' => auth()->id(),
            ],
            [
                'rating' => $request->rating,
                'progress' => 0, // Define progress como 0 para evitar erros
            ]
        );
    
        return redirect()->back()->with('success', 'Rating updated successfully!');
    }
    public function activities($id)
    {
        // Busca o livro e as atividades relacionadas
        $book = Book::with('activities')->findOrFail($id);
    
        // Retorna a view diretamente da pasta views
        return view('activities', compact('book'));
    }
}