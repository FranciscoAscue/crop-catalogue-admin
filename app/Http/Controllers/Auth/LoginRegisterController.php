<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'perfil'
        ]);
    }

     /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'El campo Usuario es obligatorio.',
            'name.string' => 'El campo Usuario debe ser una cadena de texto.',
            'name.max' => 'El campo Usuario no debe tener más de 18 caracteres.',
        ];
        
        $request->validate([
            'cname' => 'required|string|max:18',
            'cemail' => 'required|email|max:250|unique:users,email',
            'cpassword' => 'required|min:6|confirmed'
        ], $messages);

        $user = User::create([
            'name' => $request->cname,
            'email' => $request->cemail,
            'password' => Hash::make($request->cpassword),
        ]);

        $user->sendEmailVerificationNotification();
        Auth::login($user);
        // Redirigir al usuario con un mensaje indicando que revise su correo
        return redirect()->route('verification.notice')
            ->with('status', 'Se ha enviado un correo de verificación. Por favor, revisa tu email.');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('Auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $user = User::where('email', $credentials['email'])->first();
 
        if ($user && !$user->hasVerifiedEmail()) {
            Auth::login($user);
            return redirect()->route('verification.notice')
                ->with('status', 'Hemos enviado un enlace de verificación a tu correo electrónico: ' . $user->email . '. Por favor, verifica tu correo para continuar.');
        }
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()-> route('home');
        }

        return back()->withErrors([
            'email' => 'Tu correo o contraseña es incorrecto!',
        ])->onlyInput('email');
    }
    
    
    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }    
}
