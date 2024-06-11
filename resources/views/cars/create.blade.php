<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Create a car</h1>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>


        @endif
    </div>

    <form method="post" action="{{route('product.store')}}">
                            @csrf 
                            @method('post')

                            <div class="form-group">
                                <input type="text" class="form-control w-25" id="name" name="name" placeholder="Name" />
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control w-25" id="model" name="model" placeholder="Model" />
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control w-25" id="price" name="price" placeholder="Price" />
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Save a New Product" />
                            </div>
                        </form>
    
</body>
</html>