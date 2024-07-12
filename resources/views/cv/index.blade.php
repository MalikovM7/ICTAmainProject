<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="container">
        <h1>Your CVs</h1>
        <a href="{{ route('cv.create') }}" class="btn btn-primary">Upload CV</a>
        <a href="{{ route('cv.manual.create') }}" class="btn btn-secondary">Create Manual CV</a>

        <table class="table mt-4">
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
                        <td>{{ $cv->category }}</td>
                        <td>{{ $cv->details ?? 'Uploaded PDF' }}</td>
                        <td>{{ $cv->expires_at }}</td>
                        <td>
                            @if ($cv->is_vip)
                                <span class="badge bg-success">VIP</span>
                            @else
                                <form action="{{ route('cv.vip', $cv->id) }}" method="POST">
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



</body>
</html>