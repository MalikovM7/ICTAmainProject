<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>


        @endif
    </div>
    
    <div class="container mt-5">
        <h3 class="mb-4">Category</h3>
        <a href="{{route('category.index')}}" class="btn btn-secondary mb-4">Back</a>
        
        <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
            @csrf 
            

            <div class="form-group">
                <label for="name">Name</label>
                <input required type="text" class="form-control w-50" id="name" name="name" placeholder="Name" />
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input required type="text" class="form-control w-50" id="slug" name="slug" placeholder="Slug" />
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control w-50" id="description" name="description" placeholder="Description"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" />
            </div>

            <h4 class="mb-3">SEO Tags</h4>

            <div class="form-group">
                <label for="meta-title">Meta-Title</label>
                <input type="text" class="form-control w-50" id="meta-title" name="meta-title" placeholder="Meta-Title" />
            </div>

            <div class="form-group">
                <label for="meta-keyword">Meta-Keyword</label>
                <textarea class="form-control w-50" id="meta-keyword" name="meta-keyword" placeholder="Meta-Keyword"></textarea>
            </div>

            <div class="form-group">
                <label for="meta-description">Meta-Description</label>
                <textarea class="form-control w-50" id="meta-description" name="meta-description" placeholder="Meta-Description"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Save Category" />
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>