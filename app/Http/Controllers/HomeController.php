<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\update;
use Auth;
use Session;
use Bugsnag;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    $notifications=Auth::user()->countNotificationsNotRead($category = null);
    $n=Auth::user()->getNotifications($limit = null, $paginate = null, $order = 'desc');



    $users = User::find(Auth::user()->id)->follow()->get();

    $entry = count(User::find(Auth::user()->id)->account);
        if($entry===0){
            Session::flash('status', 'Finish your profile');
            return view('home')-> withusers($users)-> withns($n)-> withnotifications($notifications);
        }
    else{
        return view('home')-> withusers($users)-> withns($n)-> withnotifications($notifications);
        }

    }

}
