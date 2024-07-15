<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;

class EmailVerificacion extends Controller
{
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/')->with('message', '¡Se ha verificado correctamente tu correo electrónico! Para continuar, suscríbete a alguno de nuestros planes.');
    }

    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link de verificación enviado!');
    }

    public function verification()
    {
        return view('verificar.index');
    }

    public function resend(Request $request)
    {
        $request -> user()->sendEmailVerificationNotification();
        return redirect()->route('verification.notice')->with('status', 'Correo de confirmación reenviado. Por favor, revisa tu email.');
    }
}
