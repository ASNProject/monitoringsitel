<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Write code on Method
     * 
     * @return response
     */
    public function index(): View
    {
        return view('auth.login');
    }
    /**
     * Write code on Method
     * 
     * @return response
     */
    public function register(): View
    {
        return view('auth.register');   
    }
    /**
     * Write code on Method
     * 
     * @return response 
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard')->with('success', 'Login successful!');
        }

        return redirect()->back()->with('error', 'Invalid credentials, please try again.');
    }
    /**
     * Write code on Method
     * 
     * @return response 
     */
    public function registerUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user = $this->create($data);
        Auth::login($user);
        return redirect()->intended('login')->with('Success', 'Registration successful');
    }
       /**
     * Write code on Method
     * 
     * @return response
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }
        return redirect("login")->with('error', 'You are not allowed to access');
    }
    /**
     * Write code on Method
     * 
     * @return response
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect('login')->with('Success', 'Logout successful');
    }
    /**
     * Write code on Method
     * 
     * @return response
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
