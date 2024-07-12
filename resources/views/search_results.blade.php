<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Search Results</h1>
        <a href="{{ route('user') }}" class="btn btn-secondary mb-3">Go Back</a>
        
        @if($cvs->isEmpty())
            <p>No CVs found for the given category.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Category</th>
                        <th>File Path</th>
                        <th>Details</th>
                        <th>VIP Status</th>
                        <th>Expires At</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cvs as $cv)
                        <tr>
                            <td>{{ $cv->id }}</td>
                            <td>{{ $cv->user_id }}</td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>