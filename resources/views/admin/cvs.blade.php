<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded CVs</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .table {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .alert {
            margin-top: 20px;
        }
        .btn {
            margin-right: 5px;
        }
        .btn-group {
            display: flex;
            align-items: center;
        }
        .btn-group form {
            margin: 0;
        }
        .btn-back {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <a class="btn btn-secondary btn-back" href="{{ route('adminmain') }}" role="button">Go Back</a>
    <h1 class="mb-4">Uploaded CVs</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>User ID</th>
                    <th>Category_Id</th>
                    <th>Category_Name</th>
                    <th>File Path</th>
                    <th>Details</th>
                    <th>VIP Status</th>
                    <th>Expires At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cvs as $cv)
                <tr>
                    <td>{{ $cv->user_id }}</td>
                    <td>{{ $cv->category_id }}</td>
                    <td>{{ $cv->category_name }}</td>
                    <td>
                        @if($cv->file_path)
                            <a href="{{ asset('storage/' . $cv->file_path) }}" target="_blank">{{ basename($cv->file_path) }}</a>
                        @else
                            No File
                        @endif
                    </td>
                    <td>{{ $cv->details ?? 'No Details' }}</td>
                    <td>{{ $cv->is_vip ? 'Yes' : 'No' }}</td>
                    <td>{{ $cv->expires_at->format('M d, Y') }}</td>
                    <td>{{ $cv->status ?? 'Pending' }}</td>
                    <td>
                        <div class="btn-group">
                            @if($cv->status !== 'accepted')
                            <form action="{{ route('admin.acceptCV', $cv->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Accept</button>
                            </form>
                            @endif
                            @if($cv->status !== 'rejected')
                            <form action="{{ route('admin.rejectCV', $cv->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>