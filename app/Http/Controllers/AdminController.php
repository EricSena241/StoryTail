<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // Exibe o dashboard do administrador
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Exibe o formulário de edição de perfil do administrador
    public function editProfile()
    {
        $admin = Auth::user(); // Recupera o administrador autenticado
        return view('admin.edit_profile', compact('admin')); // Exibe a view com os dados do admin
    }

    // Atualiza o perfil do administrador
    public function updateProfile(Request $request)
    {
        $admin = Auth::user();

        // Validação dos dados
        $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'username' => 'required|string|max:30|unique:users,username,' . $admin->id_user . ',id_user',
            'email' => 'required|email|unique:users,email,' . $admin->id_user . ',id_user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Atualiza os dados do administrador
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->username = $request->username;
        $admin->email = $request->email;

        // Atualiza a senha se for fornecida
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        // Salva as alterações
        $admin->save();

        // Redireciona de volta para o dashboard com uma mensagem de sucesso
        return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully.');
    }
}
