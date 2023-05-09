<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form</title>
</head>

<body>

<h1>
    Contact Form
</h1>

<p>Name : {{$dataMail['name']}}</p>
<p>Email : {{$dataMail['email']}}</p>
<p>Subject : {{$dataMail['subject']}}</p>
<p>Messgae : {{$dataMail['message']}}</p>


</body>

</html>



