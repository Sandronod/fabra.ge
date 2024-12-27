<h1>Contact</h1>
<br>
<p>
    Name: {{$request['name']}}
</p>
<p>
    E-mail: {{$request['email']}}
</p>
@if ($request['subject'])
    <p>
        Subject: {{$request['subject']}}
    </p>
@endif
<p>
    Message: {{$request['message']}}
</p>