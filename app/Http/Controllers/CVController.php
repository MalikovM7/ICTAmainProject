<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;
use DB;
class CVController extends Controller
{
    public function index()
    {
        $cvs = DB::table('cvs')->where('user_id', auth()->id())->get();
        return view('cv.index', compact('cvs'));
    }

    public function create()
    {
        return view('cv.create');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'file' => 'required|mimes:pdf',
        ]);

      


        if($request->hasFile('file')){

            $file=$request->file('file');
            
            $filename= $file->getClientOriginalName();
  
            $file->move('uploads/category',$filename);
  
            $data['file'] = 'category/'.$filename;
     
          }

        DB::table('cvs')->insert([
            'user_id' => auth()->id(),
            'category' => $request->category,
            'file_path' => $filename,
            'expires_at' => now()->addMonth(),
        ]);

        return back()->with('success', 'CV uploaded successfully.');
    }

    public function manualCreateForm()
    {
        return view('cv.manual_create');
    }

    public function manualCreate(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'details' => 'required',
        ]);

        DB::table('cvs')->insert([
            'user_id' => auth()->id(),
            'category' => $request->category,
            'details' => $request->details,
            'expires_at' => now()->addMonth(),
        ]); 

        return back()->with('success', 'CV created successfully.');
    }

    public function markAsVIP($id)
    {
        $cv = DB::table('cvs')->findOrFail($id);
        $cv->update(['is_vip' => true]);

      

        return back()->with('success', 'CV marked as VIP.');
    }
}