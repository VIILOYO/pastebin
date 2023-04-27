<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    
    public function login() {
        return view('auth.login');
    }
    
    public function customLogin(Request $request) {
        $data = $request->only('name', 'password');

        if (Auth::attempt($data)) {
            return redirect()->intended('dashboard');
        }

        return redirect()->route('login');
    }

    public function registration() 
    {
        return view('auth.registration');
    }

    public function customRegistration(AuthRequest $request) 
    {
        $data = $request-> validated();
        $this->create($data);

        return redirect()->route('login');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'password' => Hash::make($data['password'])
      ]);
    }    

    public function dashboard()
    {
        if(Auth::check()){
            return view('home');
        }
  
        return redirect("login");
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
