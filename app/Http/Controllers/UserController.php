<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use App\Models\Category;
use App\Models\ActivityLog;
use Notification;

use App\Notifications\MyFirstNotification;

use Illuminate\Support\Facades\Auth;
use DB;


class UserController extends Controller
{
    public function user(){
        return view('user');
    
    }

    public function sendNotification(Request $request)
    {
        $user = User::find(auth()->user()->id);
    
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->url,
            'lastline' => $request->lastline,
        ];
    
        Notification::send($user, new MyFirstNotification($details));
    
        return redirect()->back()->with('success', 'Email Sent Successfully');
    }

    public function signUp()
    {
        // Perform user registration logic...

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'signed up'
        ]);

        // Return response or redirect
    }

    public function createSupportTicket()
    {
        // Create support ticket logic...

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'created a support ticket'
        ]);

        // Return response or redirect
    }

    public function showCategories()
    {
        $categories = Category::all(); 
        return view('categories', compact('categories'));
    }


}


