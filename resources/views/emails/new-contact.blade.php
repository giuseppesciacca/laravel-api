<x-mail::message>
    # Introduction

    Ciao admin!
    Hai ricevuto un nuovo messaggio, ecco qui i dettagli:<br>
    Nome: {{ $lead->name }}<br>
    Email: {{ $lead->email }}<br>
    Messaggio:<br>
    {{ $lead->message }}

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>