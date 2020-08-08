Hello <i>{{ $demo->name }}</i>,
<p>This is a demo email for testing purposes! Also, it's the HTML version.</p>

<p><u>Demo object values:</u></p>

<div>
<p><b>Demo One:</b>&nbsp;{{ $demo->name }}</p>
<p><b>Demo Two:</b>&nbsp;{{ $demo->email }}</p>
</div>


Thank You,
<br/>
<i>{{ $demo->sender }}</i>
