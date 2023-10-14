<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $email = $request->input("email");
        $password = $request->input("password");
    
        $user = User::where('email', $email)->first();

        // Check if user exists and if password matches
        if ($user && ($password === $user->password)) {
            
            // Authentication successful

            $userInfo = [
                'isLogind' => true,
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                // You can add other information you need
            ];
            $request->session()->put('user', $userInfo);
            return redirect(route('user.index'));
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function register(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'firstName' => 'required',
            'lastName' => 'required'
        ], [
            'password.confirmed' => 'The password confirmation does not match.'
        ]);
        $email = $request->input("email");
        $user = User::where('email', $email)->first();
        if($user){
            return redirect(route("register"))->with('error',"Email đã tồn tại");
        }

        User::create($data);
        return redirect(route('/'));
        
    }

    public function edit(User $user){
        return view('user.edit', ['user' => $user]);
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }

    
}