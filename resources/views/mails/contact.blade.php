Hello <i>{{ $mail->name }}</i>,

<p><u>Message:</u></p>
<p>{{ $mail->message }}</p>

<div>
{{-- <p><b>Demo One:</b>&nbsp;{{ $mail->demo_one }}</p>
<p><b>Demo Two:</b>&nbsp;{{ $mail->demo_two }}</p> --}}
</div>

{{-- <p><u>Values passed by With method:</u></p> --}}


Thank You,
<br/>
<i>{{ $mail->email }}</i>
