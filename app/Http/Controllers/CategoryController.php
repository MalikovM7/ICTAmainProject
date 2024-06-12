<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){

        return view('category.index');
    }
    public function create(){

        return view('category.create');
    }

    public function store(Request $request ){

        // return $request;
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta-title' => 'nullable|string|max:255',
            'meta-keyword' => 'nullable|string',
            'meta-description' => 'nullable|string',
       
        ]);

        if($request->hasFile('image')){

          $file=$request->file('image');

          
          $ext=$file->getClientOriginalExtension();
          $filename=time().'.'.$ext;

          $file->move('uploads/category',$filename);

        //   $category->image=$filename;
   

        }

      
        $newProduct = Category::create($data);

        return redirect()->route('category.index');
    
    
    
        return redirect('category')->with('message','Created Successfully');
    
    }


}
