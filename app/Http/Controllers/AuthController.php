<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth.form-login');
    }
    
    public function processLogin(Request $request)
    {

        $request->validate(User::validationRules(), User::validationMessages());

        $credentials = $request->only(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            //Si no puedo autenticar con esas credeenciales. Credenciales incorrectas.
            return redirect()
                ->route('auth.formLogin')
                ->with('feedback.message', 'Las credenciales ingresadas no coinciden con nuestro registro.')
                ->with('feedback.type', 'danger')
                ->withInput();
        }
        //Si tengo exito y el usuario se autentico.
        //Para protegernos de "session fixation", vamos a pedir que se regenere el id de la sesion.

        $request->session()->regenerate();

        $user = Auth::user();

        // Redireccionar según el rol del usuario
        if ($user && $user->role_id === 1) {
            return redirect()->route('dashboard')
                ->with('feedback.message', 'Sesión iniciada correctamente.');
        } else {
            return redirect()->route('home')
                ->with('feedback.message', 'Sesión iniciada correctamente.');
        }
    }

    public function processLogout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()
            ->route('auth.formLogin')
            ->with('feedback.message', 'La sesión se cerró con éxito. ¡Te esperamos de regreso!');
    }

    public function formRegister()
    {
        return view('auth.form-register');
    }


    public function processRegister(Request $request)
    {
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        $request->validate(User::validationRules(), User::validationMessages());
        $existingUser = User::where('email', $data['email'])->first();

        if ($existingUser) {
            return redirect()
                ->route('auth.formRegister')
                ->with('feedback.message', 'El correo electrónico ya está en uso. Por favor, utiliza otro.')
                ->with('feedback.type', 'danger');
        }
        // Asignar rol por defecto al usuario

        $data['role'] = 'user';

        User::create($data);
        return redirect()
            ->route('auth.formLogin')
            ->with('feedback.message', 'Bienvenid@ a nuestra comunidad <b>' . e($data['email']) . '</b>');
    }
}
