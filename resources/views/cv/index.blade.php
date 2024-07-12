<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your CVs</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 20px;
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .badge-success {
            background-color: #28a745;
        }

        .card-header {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .table th, .table td {
            text-align: center;
        }

        .table {
            margin-top: 20px;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            color: #212529;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            color: #212529;
        }

        .table-container {
            margin-top: 20px;
        }
    </style>
    <script>
        function confirmVipAction(event) {
            event.preventDefault(); // Prevent form from submitting immediately
            if (confirm("To make your CV VIP, you need to pay 5 AZN. Do you want to proceed?")) {
                // If confirmed, submit the form
                event.target.closest('form').submit();
            }
        }
    </script>
</head>

<body>

    <div class="container">
    
        <h1 class="my-4">Your CVs</h1>
        <div class="mb-3">
            <a class="btn btn-secondary btn-back" href="{{ route('user') }}" role="button">Go Back</a>
        </div>

        <div class="table-container">
            <div class="card">
                <div class="card-header">
                    CVs List
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Details</th>
                                <th>Expires At</th>
                                <th>VIP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cvs as $cv)
                                <tr>
                                    <td>{{ $cv->category_name }}</td>
                                    <td>{{ $cv->details ?? 'Uploaded PDF' }}</td>
                                    <td>{{ $cv->expires_at }}</td>
                                    <td>
                                        @if ($cv->is_vip)
                                            <span class="badge badge-success">VIP</span>
                                        @else
                                            <form action="{{ route('cv.vip', $cv->id) }}" method="POST" onsubmit="confirmVipAction(event)">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">Mark as VIP</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>