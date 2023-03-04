<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect('/dashboard');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $val = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone' => 'required',
        ]);
        if($val)
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->max_production = $request->max_production;
            $user->save();
        }else{
            return redirect()->route('register')->with('error', 'Oppes! You have entered invalid credentials');
        }


        

        return redirect()->route('login')->with('success', 'Oppes! You have successfully registered');
    }
    public function logout()
    {
        session()->flush();
        auth()->logout();
        return redirect('/auth/login');
    }
    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->max_production = $request->max_production;
        if($request->password != null)
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('/dashboard')->with('success', 'Data berhasil diubah!');
    }
   
}
