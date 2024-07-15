<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Lang;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public function sendEmailVerificationNotification()
    {
        $this->notify(new class extends VerifyEmail {
            protected function buildMailMessage($url)
            {
                return (new MailMessage)
                    ->greeting(Lang::get('¡Hola!')) // Personalizar el saludo
                    ->subject(Lang::get('Verifica tu dirección de correo electrónico'))
                    ->line(Lang::get('Haz clic en el botón de abajo para verificar tu dirección de correo electrónico.'))
                    ->action(Lang::get('Verificar Correo Electrónico'), $url)
                    ->line(Lang::get('Si el botón no esta funcionado recuerda que puedes volver a pedir tu correo de verificación entrando con tu correo a la página de Biosofhus.'))
                    ->salutation(Lang::get('Saludos,') . "\n" . Lang::get('Foreslab'));
            }
        });
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
