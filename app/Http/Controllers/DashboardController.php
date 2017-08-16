<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class DashboardController extends Controller
{
    public function index(){
    	$user = User::find(Auth::id());
		// return view('dashboard', ['user'=>$user]);
		return view('pages.dashboard.src.app.app.component.php', ['user'=>$user]);
    }
}
