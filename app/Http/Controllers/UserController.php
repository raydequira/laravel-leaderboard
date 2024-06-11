<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        return view('user/index');
    }

    public function add() 
    {
        return view('user/add');
    }

    public function store(Request $request) 
    {
        $userData = [
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|string|lowercase|email|max:50|unique:'.User::class,
            'phone'      => 'required|digits:10',
        ];

        $request->validate($userData);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        return redirect()->route('users')->with('success', 'The user was successfully added');;
    }
}
