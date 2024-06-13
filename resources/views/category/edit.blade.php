<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Category</h1>
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
            </div>
            
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $category->slug) }}" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $category->description) }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="Current Image" class="img-thumbnail mt-2" width="150">
                @endif
            </div>
            
            <div class="form-group">
                <label for="meta-title">Meta Title</label>
                <input type="text" name="meta-title" id="meta-title" class="form-control" value="{{ old('meta-title', $category->{'meta-title'}) }}">
            </div>
            
            <div class="form-group">
                <label for="meta-keyword">Meta Keyword</label>
                <input type="text" name="meta-keyword" id="meta-keyword" class="form-control" value="{{ old('meta-keyword', $category->{'meta-keyword'}) }}">
            </div>
            
            <div class="form-group">
                <label for="meta-description">Meta Description</label>
                <textarea name="meta-description" id="meta-description" class="form-control">{{ old('meta-description', $category->{'meta-description'}) }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
</body>
</html>