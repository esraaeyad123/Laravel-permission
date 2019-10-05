@component('mail::message')
# order Completed

Thank you for your order . please
@component('mail::button', ['url' => 'https://www.google.com.sa'])
visit our site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
