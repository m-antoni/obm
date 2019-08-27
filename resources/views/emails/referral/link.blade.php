@component('mail::message')
# Referral Link

<br>
<p>You have been refer by your friend </p>
<b>{{ auth()->user()->getFullNameAttribute() }}</b>

<br>

@component('mail::button', ['url' => $data])
Click here to verify
@endcomponent

<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
