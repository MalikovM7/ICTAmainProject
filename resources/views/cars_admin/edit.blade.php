<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    
<h1>Edit a Product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>


        @endif
    </div>
    <form method="post" action="{{route('product.update.admin', ['car' => $car])}}">
                            @csrf 
                            @method('put')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control w-25" id="name" name="name" placeholder="Name" value="{{$car->name}}" />
                            </div>

                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" class="form-control w-25" id="model" name="model" placeholder="Model" value="{{$car->model}}" />
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control w-25" id="price" name="price" placeholder="Price" value="{{$car->price}}" />
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Update" />
                            </div>
                        </form>

</body>
</html>
