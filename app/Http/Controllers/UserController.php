<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request){
        $data = $request->session()->get("user");
   
        if(!$data || !$data['isLogind']){
            return redirect("/");
        }
        $users = User::all();
        return view('user.index', ['users' => $users]);
        
    }

    public function create(Request $request){
        $data = $request->session()->get("user");
   
        if(!$data || !$data['isLogind']){
            return redirect("/");
        }
        $users = User::all();
        return view('user.create');
    }

    public function store(Request $request){
        $data = $request->session()->get("user");
   
        if(!$data || !$data['isLogind']){
            return redirect("/");
        }
        $users = User::all();
        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $newUser = User::create($data);

        return redirect(route('user.index'));

    }

    public function edit(User $user,Request $request){
        $data = $request->session()->get("user");
   
        if(!$data || !$data['isLogind']){
            return redirect("/");
        }
        $users = User::all();
        return view('user.edit', ['user' => $user]);
    }

    public function update(User $user, Request $request){
        $data = $request->session()->get("user");
   
        if(!$data || !$data['isLogind']){
            return redirect("/");
        }
        $users = User::all();
        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required|',
            'email' => 'required',
            'password' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $user->update($data);

        return redirect(route('user.index'))->with('success', 'User Updated Succesffully');

    }

    public function destroy(User $user,Request $request){
        $data = $request->session()->get("user");
   
        if(!$data || !$data['isLogind']){
            return redirect("/");
        }
        $users = User::all();
        $user->delete();
        return redirect(route('user.index'))->with('success', 'User Deleted Succesffully');
    }
}