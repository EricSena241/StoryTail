<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Certifique-se de importar o modelo de usuário

class ForgotPasswordController extends Controller
{
    /**
     * Exibir o formulário de recuperação de senha.
     */
    public function showForm()
    {
        return view('forgot-password');
    }

    /**
     * Manipular o formulário de recuperação de senha.
     */
    public function submitForm(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'username' => 'required|exists:users,username',
            'new_password' => 'required|min:6',
        ]);

        // Localizar o usuário pelo nome de usuário
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Atualizar a senha do usuário
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}
