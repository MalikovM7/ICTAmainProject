<!-- resources/views/vip-cvs.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIP CVs</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .vip-cvs {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">VIP CVs</h1>

        @if ($vipCVs->isEmpty())
            <p>No VIP CVs available at the moment.</p>
        @else
            <div class="vip-cvs">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Category</th>
                            <th>Details</th>
                            <th>Expires At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vipCVs as $cv)
                            <tr>
                                <td>{{ $cv->id }}</td>
                                <td>{{ $cv->user_id }}</td>
                                <td>{{ $cv->category_name }}</td>
                                <td>{{ $cv->details }}</td>
                                <td>{{ $cv->expires_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>