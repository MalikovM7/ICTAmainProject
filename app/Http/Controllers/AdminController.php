<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use App\Models\Category;
use DB;

class AdminController extends Controller
{
    public function showUsers()
    {
        $users = User::all(); 
        return view('users', compact('users'));
    }
    public function showCategories()
    {
        $categories = Category::all(); 
        return view('categories', compact('categories'));
    }



}
