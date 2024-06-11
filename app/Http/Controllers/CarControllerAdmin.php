<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use DB;

class CarControllerAdmin extends Controller
{
    


public function index_admin(){

    $cars= Car::all();
    return view('cars_admin.index',['cars'=>$cars]);

}

// public function user(){
//     return view('user');

// }

public function create_admin(){

    return view('cars_admin.create');
}

public function store_admin(Request $request ){
    $data = $request->validate([
        'name' => 'required',
        'model' => 'required',
        'price' => 'required|numeric',

    ]);
    
    $newProduct = Car::create($data);

    return redirect()->route('admin');

}

public function edit_admin(Car $car){

return view('cars_admin.edit',['car'=>$car]);

}


public function update_admin(Car $car, Request $request){
    $data = $request->validate([
        'name' => 'required',
        'model' => 'required',
        'price' => 'required|numeric',

    ]);

    $car->update($data);

    return redirect(route('admin'))->with('success', 'Car Updated Succesffully');

}

public function delete_admin(Car $car){
    // return $nn = DB::table('users')->get();
    $car->delete();
    return redirect(route('admin'))->with('success', 'Car deleted Succesffully');
}


}
