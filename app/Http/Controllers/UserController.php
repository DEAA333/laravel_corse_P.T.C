<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function create(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('password123');
        $user->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::find($id);
        $users = User::all();
        return view('users', compact('user', 'users'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('users');
    }
}
