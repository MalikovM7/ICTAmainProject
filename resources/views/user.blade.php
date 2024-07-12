<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        .form-title {
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #28a745;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-secondary text-white text-center">
                <h1>User Page</h1>
            </div>
            <div class="card-body">
                <div class="form-container">
                    <h4 class="form-title text-center">Send an Email</h4>
                    <form action="{{ route('user.mail') }}" method="POST">
                        @csrf

                        @if(Session::has('error'))
    <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px 20px; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 20px;">
        <strong>Error:</strong> {{ Session::get('error') }}
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px 20px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
        <strong>Success:</strong> {{ Session::get('success') }}
    </div>
@endif

                        

                        <div class="form-group">
                            <label for="greeting">Greeting</label>
                            <input class="form-control" type="text" id="greeting" name="greeting" placeholder="Enter greeting">
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <input class="form-control" type="text" id="body" name="Body" placeholder="Enter email body">
                        </div>

                        <div class="form-group">
                            <label for="actiontext">Action Text</label>
                            <input class="form-control" type="text" id="actiontext" name="actiontext" placeholder="Enter action text">
                        </div>

                        <div class="form-group">
                            <label for="url">URL</label>
                            <input class="form-control" type="text" id="url" name="url" placeholder="Enter URL">
                        </div>

                        <div class="form-group">
                            <label for="lastline">Last Line</label>
                            <input class="form-control" type="text" id="lastline" name="lastline" placeholder="Enter last line">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-custom">Submit</button>
                        </div>
                    </form>
                </div>

                <form action="{{ route('logout') }}" method="post" class="mt-3 d-flex justify-content-center">
                    @csrf
                    <button type="submit" class="btn btn-danger w-25">Logout</button>
                </form>

                <form action="{{  route('user.categories') }}" method="post" class="mt-3 d-flex justify-content-center">
                    @csrf
                    <button type="submit" class="btn btn-info w-25">Categories</button>
                </form>

                <form action="{{ route('cvdashboard') }}" method="GET" class="mt-3 d-flex justify-content-center">
                    @csrf
                    <button type="submit" class="btn btn-info w-25">CVS</button>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('user_car') }}" class="btn btn-outline-primary">Go to Table</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>