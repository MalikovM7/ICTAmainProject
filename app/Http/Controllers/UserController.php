<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;

use Notification;

use App\Notifications\MyFirstNotification;
use DB;


class UserController extends Controller
{
    public function user(){
        return view('user');
    
    }

    public function sendnotification(Request $request){


        $user=User::all();

        $details=[

          'greeting'=>$request->greeting,
          'body'=>$request->body,
          'actiontext'=>$request->actiontext,
          'actionurl'=>$request->url,
          'lastline'=>$request->lastline,

        ];

        Notification::send($user,new MyFirstNotification($details));

        dd('done');
    
    }





}


