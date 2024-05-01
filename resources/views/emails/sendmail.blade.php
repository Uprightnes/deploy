@component('mail::message')
# Redeployment Notification

Hello {{ $data['surname'] }} {{ $data['othername'] }},

You have been redeployed to a new role in {{ $data['new_department'] }} department.

Please find attached the necessary documents regarding your redeployment.

@component('mail::button', ['url' => ''])
View Documents
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@php
    // Log a message to the console
    \Illuminate\Support\Facades\Log::info('Email will be sent to: ' . $data['surname'] . ' ' . $data['othername']);
@endphp
@endcomponent
