<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Retorna a view de login
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt([
        'username' => $request->username,
        'password' => $request->password,
    ])) {
        $request->session()->regenerate();

        // Preencher manualmente o user_id na sessão
        session()->put('user_id', Auth::id());

        return redirect()->intended('/home');
    }

    return back()->withErrors([
        'username' => 'Invalid username or password.',
    ])->onlyInput('username');
}

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/home'); // Redireciona para o login
}


}
