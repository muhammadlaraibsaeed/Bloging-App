<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Email Title</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Hello, {{ $data['name'] }}</h1>
    <p>{{ $data['message'] }}</p>

    <p>Thanks,<br>{{ config('app.name') }}</p>
</body>
</html>
