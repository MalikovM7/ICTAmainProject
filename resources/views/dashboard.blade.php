<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add any additional custom CSS here -->
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .dashboard-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .btn-custom {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome to your Dashboard</h1>
        <!-- Add your dashboard content here -->

        <form action="{{ route('adminmain') }}" method="post" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-info btn-custom">Go To The Page</button>
        </form>

        <form action="{{ route('logout') }}" method="post" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger btn-custom">Logout and Login Again</button>
        </form>

       

    </div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>