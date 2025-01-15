<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Exibir a página de contato.
     */
    public function showForm()
    {
        return view('contact'); // Aponta para a view 'resources/views/contact.blade.php'
    }

    /**
     * Processar o formulário de contato.
     */
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'message' => 'required|string',
        ]);

        // Salvar os dados no banco de dados
        Contact::create($request->only('name', 'email', 'phone', 'message'));

        // Redirecionar com mensagem de sucesso
        return redirect()->back()->with('success', 'Mensagem enviada com sucesso!')->withInput([]);
    }
}
