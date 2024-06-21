<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use App\Models\Category;
use App\Models\ActivityLog;
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




}
