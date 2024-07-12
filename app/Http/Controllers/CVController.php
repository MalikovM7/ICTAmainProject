<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    
    public function index()
    {
        $cvs = DB::table('cvs')
            ->where('user_id', auth()->id())
            ->get();
        return view('cv.index', compact('cvs'));
    }

   
    public function create()
    {
        
        $categories = DB::table('categories')->get();
        return view('cv.create', compact('categories'));
    }

  
    public function upload(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|mimes:pdf',
        ]);
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/category', $filename, 'public');
    
            // Retrieve category name from the categories table
            $categoryName = DB::table('categories')->where('id', $request->category_id)->value('name');
    
            DB::table('cvs')->insert([
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'category_name' => $categoryName, // Insert category name
                'file_path' => $filePath,
                'expires_at' => now()->addMonth(),
            ]);
    
            return back()->with('success', 'CV uploaded successfully.');
        }
    
        return back()->with('error', 'File upload failed.');
    }

    // Show the form to create a manual CV
    public function manualCreateForm()
{
    $categories = DB::table('categories')->get(); // Fetch categories from the database
    return view('cv.manual_create', ['categories' => $categories]);
}

    // Handle the creation of a manual CV
    public function manualCreate(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'details' => 'required',
    ]);

    // Retrieve category name from the categories table
    $categoryName = DB::table('categories')->where('id', $request->category_id)->value('name');

    DB::table('cvs')->insert([
        'user_id' => auth()->id(),
        'category_id' => $request->category_id,
        'category_name' => $categoryName, // Insert category name
        'details' => $request->details,
        'expires_at' => now()->addMonth(),
    ]);

    return back()->with('success', 'CV created successfully.');
}

    // Mark a CV as VIP
    public function markAsVIP($id)
    {
        // Update the 'is_vip' field directly
        $affected = DB::table('cvs')
            ->where('id', $id)
            ->update(['is_vip' => true]);

        // Check if any rows were affected
        if ($affected) {
            return back()->with('success', 'CV marked as VIP.');
        }

        return back()->with('error', 'CV not found.');
    }

    // View manual CVs (where file_path is null)
    public function viewManualCVs()
    {
        $manualCVs = DB::table('cvs')->whereNull('file_path')->get();
        return view('cv.manual_cvs', compact('manualCVs'));
    }

    
}