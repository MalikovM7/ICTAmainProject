<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV; // Make sure to use the correct model for your CV
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SearchController extends Controller
{

   

    public function search(Request $request)
    {
        $categoryName = $request->input('category'); 

        
        $cvs = DB::table('cvs')
            ->join('categories', 'cvs.category_id', '=', 'categories.id')
            ->where('categories.name', 'like', "%{$categoryName}%")
            ->select('cvs.*', 'categories.name as category_name')
            ->get()
            ->map(function($cv) {
                // Convert expires_at to Carbon instance
                $cv->expires_at = Carbon::parse($cv->expires_at);
                return $cv;
            });

       
        return view('search_results', ['cvs' => $cvs]);
    }
}