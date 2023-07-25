@component('mail::message')
Hi {{ $maildata['name'] }},



@component('mail::button', ['url' => route('download.invoice', $maildata['id'])])
Download
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
