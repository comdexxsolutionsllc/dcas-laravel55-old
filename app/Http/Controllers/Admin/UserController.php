<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;


class UserController extends Controller
{
    public function user_switch_start($new_user)
    {
        $new_user = User::find($new_user);
        Session::put('orig_user', Auth::id());
        Auth::login($new_user);
        return redirect()->back();
    }

    public function user_switch_stop()
    {
        $id = Session::pull('orig_user');
        $orig_user = User::find($id);
        Auth::login($orig_user);
        return redirect()->back();
    }
}

//// Inside View
//<a href="admin/user/switch/start/2">Login as 2</a>
//
//@if( Session::has('orig_user') )
//<a href="admin/user/switch/stop">Switch back to 1</a>
//@endif
//
//
//// Simple Test inside View
//@if( Auth::id() == 1 )
//    User 1
//@endif
//
//@if( Auth::id() == 2 )
//    User 2
//@endif