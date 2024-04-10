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

    public function register(RegisterRequest $request) {

        try {
            $adminRole = Role::query()->where('name', 'admin')->firstOrFail();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => "Erreur lors de la création de l'utilisateur. Veuillez réessayer."]);
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role_id'   => $adminRole->id
        ]);

        if(!$user)
            return redirect()->back()->withErrors(['error' => "Erreur lors de la création de l'utilisateur. Veuillez réessayer."]);

        Auth::login($user);

        if(strtolower($adminRole->name) === 'admin')
            return redirect()->route('admin.products.index');
        else
            return redirect('/');
    }
}
