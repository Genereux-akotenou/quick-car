<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view() {
        return view('shared.login');
    }

    public function register_view() {
        return view('shared.register');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:8',
        ]);

        $remember = (request('remenber_me') == 'on') ? TRUE : FALSE;

        if(Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('shared.voiture');
        }

        return back()->withErrors([
            'status' => 'Oups ! Mot de passe ou nom d\'utilisateur erroné.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }

    public function register(){
        request()->validate([
            'name'      => 'required',
            'telephone' => 'required',
            'email'     => 'required | email',
            'password'  => 'required | confirmed | min:8',
        ]);

        $validatedData = [
            'name'      => request('name'),
            'telephone' => request('telephone'),
            'email'     => request('email'),
            'password'  => bcrypt(request('password')),
        ];

        $newUser = new User();
        $newUser->fill($validatedData);

        try
        {
            $newUser->saveOrFail();
        }
        catch (Throwable)
        {
            return back()
                ->withInput()
                ->withErrors([
                    'status' => 'Oops! An error occur while trying to register.'
                ]);
        }
        return redirect()->route('auth.login')->with('state', 'Compte crée avec succès. Connectez vous à présent!');
    }
}
