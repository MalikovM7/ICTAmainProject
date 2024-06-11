<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    
public function index(){
    $cars= Car::all();
    return view('cars.index',['cars'=>$cars]);

}

public function create(){

    return view('cars.create');
}

public function store(Request $request ){
    $data = $request->validate([
        'name' => 'required',
        'model' => 'required',
        'price' => 'required|numeric',

    ]);

    $newProduct = Car::create($data);

    return redirect()->route('product.index');

}

public function edit(Car $car){

return view('cars.edit',['car'=>$car]);

}


public function update(Car $car, Request $request){
    $data = $request->validate([
        'name' => 'required',
        'model' => 'required',
        'price' => 'required|numeric',

    ]);

    $car->update($data);

    return redirect(route('product.index'))->with('success', 'Car Updated Succesffully');

}

public function delete(Car $car){
    $car->delete();
    return redirect(route('product.index'))->with('success', 'Car deleted Succesffully');
}


}
