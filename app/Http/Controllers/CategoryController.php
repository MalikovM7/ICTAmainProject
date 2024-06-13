<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;



class CategoryController extends Controller
{
    public function index(){

        $categories= Category::all();
        return view('category.index',['categories'=>$categories]);
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
          
          $filename= $file->getClientOriginalName();

          $file->move('uploads/category',$filename);

          $data['image'] = 'category/'.$filename;
   
        }

      
        $newProduct = Category::create($data);

        return redirect()->route('category.index');
    
    
    
        return redirect('category')->with('message','Created Successfully');
    
    }



    public function edit(Category $category){

        return view('category.edit',['category'=>$category]);
        
        }
        
        
        public function update(Category $category, Request $request){
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'meta-title' => 'nullable|string|max:255',
                'meta-keyword' => 'nullable|string',
                'meta-description' => 'nullable|string',
        
            ]);
        
            $category->update($data);
        
            return redirect(route('category.index'))->with('success', 'Category Updated Succesffully');
        
        }

        public function delete(Category $category){
            $category->delete();
            return redirect(route('category.index'))->with('success', 'Car deleted Succesffully');
        }


}
