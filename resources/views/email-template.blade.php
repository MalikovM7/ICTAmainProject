<!DOCTYPE html>
<html>
<head>
    <title>Email Notification</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 40px auto;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            font-size: 24px;
            font-weight: bold;
        }
        .body {
            margin: 20px 0;
            padding: 0 15px;
        }
        .button {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px auto;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #45a049;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            {{ $greeting }}
        </div>
        <div class="body">
            <p>{{ $body }}</p>
        </div>
        <div style="text-align: center;">
            <a href="{{ $actionurl }}" class="button">{{ $actiontext }}</a>
        </div>
        <div class="footer">
            <p>{{ $lastline }}</p>
        </div>
    </div>
</body>
</html>