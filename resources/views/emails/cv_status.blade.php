<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Your CV has been {{ $status }}</h1>
    <p>Dear {{ $user->name }},</p>
    <p>Your CV has been {{ $status }} by the administrator.</p>
    <p>Thank you for using our service.</p>
</body>
</html>