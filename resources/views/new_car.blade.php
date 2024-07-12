<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="{{route('add_new_car')}}">
                            @csrf 
                            @method('post')

                            <div class="form-group">
                                <input type="text" class="form-control w-25" id="name" name="name" placeholder="Name" />
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control w-25" id="model" name="surname" placeholder="Surname" />
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control w-25" id="price" name="price" placeholder="Price" />
                            </div>

                            
                            <select name="brand_id">
                                <option value="" disabled selected>Secim et</option>
                                @foreach($brand as $br)
                                    <option value="{{ $br->id }}">{{ $br->name }}</option>
                                @endforeach
                            </select>
                            <select name="model_id">
                                <option value="" disabled selected>Secim et</option>
                                @foreach($model as $md)
                                    <option value="{{ $md->id }}">{{ $md->name }}</option>
                                @endforeach
                            </select>
                            <select name="fueltype_id">
                                <option value="" disabled selected>Secim et</option>
                                @foreach($fueltype as $ft)
                                    <option value="{{ $ft->id }}">{{ $ft->name }}</option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Save a New Product" />
                            </div>
                        </form>
</body>
</html>