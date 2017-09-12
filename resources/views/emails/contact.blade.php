<h3>Naujas informacinis pranešimas</h3>

<div>
    <hr>
    {{ $bodyMessage }} <br>
    <hr>
    Autorius: {{ Auth::user()->name }}
</div>

<p>Siuntėjo nurodytas e-mail: {{ $email }}</p>