<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use DB;


class UserController extends Controller
{
    public function user(){
        return view('user');
    
    }
}
