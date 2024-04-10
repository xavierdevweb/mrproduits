<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(RegisterRequest $request) {
        $isCreated = User::register($request->name, $request->email, $request->password, "admin", $user);

        if(!$isCreated) return redirect()->back()->withErrors(['error' => "Erreur lors de la création de l'utilisateur. Veuillez réessayer."]);

        Auth::login($user);

        return redirect()->route($user->isAdmin() ? 'admin.products.index' : '/');
    }
}
