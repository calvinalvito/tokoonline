@component('mail::message')
# Welcome!

Hi {{$user->name}}
<br>
Welcome to Laravel-Dev, your account has been created succesfully, Noe you can choose your best match camp!

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
