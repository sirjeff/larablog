<h3>New Message via your contact form</h3>
<p>Sent from {{ $email }}</p>
<hr>
<pre>{{ $bodyMessage }}</pre>
<hr>

<h4>Technical Details</h4>
<p>
  <strong>IP Address:</strong> {{ $userIp }}<br>
  <strong>User Agent:</strong> {{ $userAgent }}
</p>