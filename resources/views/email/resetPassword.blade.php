@component('mail::message')
# Reset Password

Ikuti link dibawah ini untuk melakukan reset password akun anda. Link hanya berlaku selama 30 menit
<br>

@component('mail::button', ['url' => 'https://health-monitoring-itb.my.id/reset-password/'.$id])
Reset Password
@endcomponent

Terima Kasih,<br>
Admin
@endcomponent
