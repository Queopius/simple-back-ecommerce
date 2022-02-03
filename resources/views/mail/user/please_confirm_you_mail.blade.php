@component('mail::message')

Hello **{{ $user->username }}**,
# One Last Step

Sólo necesitamos que confirme su dirección de correo electrónico para demostrar que eres un ser humano. Lo entiendes, ¿verdad?

@component('mail::button', ['url' => url('/register/confirm?token=' . $user->email_verified_at)])
Confirmar Email
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
