@component('mail::message')
# Referral Link

<br>
<p>
	You have been refer by your friend <b>{{ auth()->user()->getFullNameAttribute() }}</b> <br>
	This is your Referral Code: <b>{{ $key }}</b>
</p>


<br>

@component('mail::button', ['url' => $link])
Click here to verify
@endcomponent

<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
