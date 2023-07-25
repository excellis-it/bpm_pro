@component('mail::message')
Hi {{ $maildata['name'] }},

Welcome to {{ config('app.name') }}. Your account has been created successfully. You will able to go your dashboard once your account is active .

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
