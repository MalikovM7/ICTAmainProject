<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Manual CV</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Create Manual CV</h1>
        <form action="{{ route('cv.manual.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
    <label for="category_id" class="form-label">Category</label>
    <select name="category_id" id="category_id" class="form-control" required>
        <option disabled selected>Choose an Option</option>
        @foreach($categories as $ct)
            <option value="{{ $ct->id }}">{{ $ct->name }}</option>
        @endforeach
    </select>
</div>
            <div class="form-group mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea class="form-control" id="details" name="details" rows="4" placeholder="Enter CV details" required></textarea>
            </div>
            <button type="submit" class="btn btn-custom">Create</button>
            <a class="btn btn-secondary btn-back" href="{{ route('user') }}" role="button">Go Back</a>

        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>