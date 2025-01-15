<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $userTypes = \App\Models\UserType::all(); // Obtenha todos os tipos de usuários
        return view('register', compact('userTypes')); // Passa os tipos de usuários para a view
    }
    

    public function register(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // "confirmed" exige o campo "password_confirmation"
            'id_usertype' => 'required|exists:user_types,id_usertype',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
       

        // Criar usuário
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash para o campo correto
            'id_usertype' => $request->id_usertype,
        ]);
    
        // Faz login automático
        //Auth::login($user);
    
        // Redireciona para o dashboard
        return redirect('/home')->with('success', 'Account created successfully!');
    }
    
}
