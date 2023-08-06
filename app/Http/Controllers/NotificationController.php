<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function coordinacion_number_notifications(){
        if(auth()->user() != null){
            $user = User::find(auth()->user()->id);
            $notify = $user->unreadNotifications;
            return count($notify);
        }else{
            return null;
        }
    }
    public function coordinacion_notifications(){
        if(auth()->user() != null){
            $user = User::find(auth()->user()->id);
            return $user->unreadNotifications;

        }else{
            return null;
        }
    }
}
