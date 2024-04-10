<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
            return redirect()->back()->withErrors(['email' => 'Identifiants invalides']);

        if (strtolower(Auth::user()->role->name) === 'admin')
            return redirect()->intended('/admin/products');
        else
            return redirect()->intended('/');


    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
