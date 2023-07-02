<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.show-users', compact('users'));
    }

    public function create()
    {
        return view('user.form');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        if (isset($id) && $id > 0) {
            $filename = time() . '.' . request()->image->extension();
            $user = $request->id;
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $filename;
            $user->update();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,html|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            return redirect()->route('users');
        } else {
            $filename = time() . '.' . request()->image->extension();
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $filename;
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,html|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            $user->save();
            return redirect()->route('users');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.form',compact('user'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users');
    }

}
