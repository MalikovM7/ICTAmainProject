<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\CVStatusMail;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use App\Models\Category;
use App\Models\ActivityLog;
use App\Models\CV;
use Carbon\Carbon;


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


//New Signups
    public function adminPage()
    {
        $usercount = User::count();
        $newSignupsToday = User::whereDate('created_at', now()->toDateString())->count();
        $newSignupsThisWeek = User::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $newSignupsThisMonth = User::whereMonth('created_at', now()->month)->count();

//Total Active Sessions
        $activeUsers = User::all()->filter(function ($user) {
            return Cache::has('user-is-online-' . $user->id);
        });

        $activeSessionsCount = $activeUsers->count();
        
//Activities
        $activities = ActivityLog::latest()->take(10)->get(); // Example: Get latest 10 activities
     
        return view('adminpage', compact('newSignupsToday', 'newSignupsThisWeek', 'newSignupsThisMonth','usercount','activeSessionsCount','activities'));
        
    }


    //CVS

    public function viewCVs()
    {
        $cvs = DB::table('cvs')->whereNotNull('file_path')->get();
        // Convert expires_at to Carbon instance if needed
        $cvs->each(function ($cv) {
            $cv->expires_at = Carbon::parse($cv->expires_at);
        });
        return view('admin.cvs', compact('cvs'));
    }

    public function acceptCV($id)
    {
        $cv = DB::table('cvs')->find($id);

        // Update the status using DB facade
        DB::table('cvs')->where('id', $id)->update(['status' => 'accepted']);

        // Reload the cv to get the updated status
        $cv = DB::table('cvs')->find($id);

        // Fetch the user associated with the CV
        $user = DB::table('users')->find($cv->user_id);

        // Pass the user data to the Mailable
        Mail::to($user->email)->send(new CVStatusMail($cv, 'accepted', $user));

        return redirect()->route('admin.cvs')->with('success', 'CV accepted successfully.');
    }

    public function rejectCV($id)
    {
        $cv = DB::table('cvs')->find($id);

        // Update the status using DB facade
        DB::table('cvs')->where('id', $id)->update(['status' => 'rejected']);

        // Reload the cv to get the updated status
        $cv = DB::table('cvs')->find($id);

        // Fetch the user associated with the CV
        $user = DB::table('users')->find($cv->user_id);

        // Pass the user data to the Mailable
        Mail::to($user->email)->send(new CVStatusMail($cv, 'rejected', $user));

        return redirect()->route('admin.cvs')->with('success', 'CV rejected successfully.');
    }

    public function viewManualCVs()
    {
        // Fetch manual CVs with a null file_path
        $manualCVs = DB::table('cvs')->whereNull('file_path')->get();
        return view('admin.manual_cvs', compact('manualCVs'));
    }

    public function acceptManualCV($id)
    {
        // Update the status to 'accepted'
        DB::table('cvs')->where('id', $id)->update(['status' => 'accepted']);

        // Fetch the updated CV and associated user
        $cv = DB::table('cvs')->where('id', $id)->first();
        $user = DB::table('users')->where('id', $cv->user_id)->first();

        // Send the acceptance email
        Mail::to($user->email)->send(new CVStatusMail($cv, 'accepted', $user));

        return back()->with('success', 'Manual CV accepted successfully.');
    }

    public function rejectManualCV($id)
    {
        // Update the status to 'rejected'
        DB::table('cvs')->where('id', $id)->update(['status' => 'rejected']);

        // Fetch the updated CV and associated user
        $cv = DB::table('cvs')->where('id', $id)->first();
        $user = DB::table('users')->where('id', $cv->user_id)->first();

        // Send the rejection email
        Mail::to($user->email)->send(new CVStatusMail($cv, 'rejected', $user));

        return back()->with('success', 'Manual CV rejected successfully.');
    }

    public function storeManualCV(Request $request)
    {
        // Validate the request
        $request->validate([
            'category' => 'required|string|max:255',
            'details' => 'nullable|string',
            'expires_at' => 'required|date|after:today', // Ensure expiry date is after today
        ]);

        // Insert the new manual CV into the database
        DB::table('cvs')->insert([
            'user_id' => auth()->id(),
            'category' => $request->category,
            'details' => $request->details,
            'file_path' => null,
            'is_vip' => false, // Set default value for VIP status
            'status' => 'pending', // Default status
            'expires_at' => $request->expires_at,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.manualCVs')->with('success', 'Manual CV created successfully.');
    }

    public function showVIPCVs()
    {
        // Fetch VIP CVs from the database using DB facade
        $vipCVs = DB::table('cvs')
            ->where('is_vip', true)
            ->get()
            ->map(function ($cv) {
                $cv->expires_at = Carbon::parse($cv->expires_at);
                return $cv;
            });

        // Return the view with VIP CVs
        return view('vip_cvs', ['vipCVs' => $vipCVs]);
    }



}
