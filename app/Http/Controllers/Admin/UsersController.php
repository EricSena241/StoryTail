<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::whereIn('id_usertype', [1, 3])->get();
        return view('admin.users.index', compact('users'));
    }

    public function makePremium($id)
    {
        $user = User::findOrFail($id);
        $user->id_usertype = 3;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated to Premium.');
    }

    public function removePremium($id)
    {
        $user = User::findOrFail($id);
        $user->id_usertype = 1;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Premium removed from user.');
    }
}