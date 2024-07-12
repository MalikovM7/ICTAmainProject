<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('adminpage');
        
    }


    public function NewCar()
    {
        $brand = DB::table('a_brand')->get();
        $model = DB::table('a_model')->get();
        $fueltype = DB::table('a_fueltype')->get();
        return view('new_car')->with('brand', $brand)->with('model', $model)->with('fueltype', $fueltype);
        
    }

    public function AddNewCar(Request $req)
    {
        DB::table('cars')->insert([
            'name' => $req->name,
            'surname' => $req->surname,
            'price' => $req->price,
            'brand_id' => $req->brand_id,
            'model_id' => $req->model_id,
            'fueltype_id' => $req->fueltype_id
        ]);
        return redirect()->route('new_car');
        
    }

}
