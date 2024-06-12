<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add any necessary CSS or JS links here -->
</head>
<body>
    <h1>Welcome to your Dashboard</h1>
    <!-- Add your dashboard content here -->


    <form action="{{ route('logout') }}" method="post" class="mt-3 d-flex justify-content-center">
                    @csrf
                    <button type="submit" class="btn btn-danger w-25">Logout</button>
                </form>

                <form action="{{ route('login') }}" method="post" class="mt-3 d-flex justify-content-center">
                    @csrf
                    <button type="submit" class="btn btn-danger w-25">Login</button>
                </form>


</body>
</html>