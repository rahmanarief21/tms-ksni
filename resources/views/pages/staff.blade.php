<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff</title>
</head>
<body>
    <h3>Staff Page</h3>
    <p>
        <a href="{{ route('welcome_page') }}">Hai, {{ Auth::user()->name }} You Are {{ Auth::user()->roles->first()->name }}</a>
    </p>
</body>
</html>