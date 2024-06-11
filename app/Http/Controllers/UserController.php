<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GamePlayers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();

        return view('user/index',[
            'users' => $users,
        ]);
    }

    public function add() 
    {
        return view('user/add');
    }

    public function store(Request $request) 
    {
        $this->processUser($request);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        return redirect()->route('users')->with('success', 'The user was successfully added');;
    }

    public function edit(Request $request) {
        $userId = $request->id;
        $user   = User::findOrFail($userId);

        $average = GamePlayers::Where([
            'user_id' => $userId
        ])->avg('score');
        
        return view('user/edit', [
            'user'    => $user,
            'average' => $average
        ]);
    }

    public function update(Request $request) {
        $userId = $request->id;
        $user   = User::findOrFail($userId);

        $this->processUser($request, $userId);
        
        $user->fill([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'role'       => $request->role,
            'is_active'  => $request->is_active,
        ]);

        // Save user to database
        $user->save();

        return redirect()->route('users')->with('success', 'The user was successfully updated');;
    }

    private function processUser($request, $id = null) {
        $userData = [
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|string|lowercase|email|max:50|unique:'.User::class,
            'phone'      => 'required|digits:11',
        ];

        if ($id) {
            $userData['email'] = 'required|string|lowercase|email|max:255|unique:users,email,'. $id;
        }

        $request->validate($userData);

        return;
    }
}
