@component('mail::message')
# Ciao admin!

Hai ricevuto un nuovo messaggio, ecco qui i dettagli:

Nome: {{ $lead->name }}

Email: {{ $lead->email }}

Messaggio:

@component('mail::panel')
{{ $lead->message }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent