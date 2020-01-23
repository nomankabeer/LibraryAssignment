<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_id == User::clientRoleId){
            return redirect()->route('client.get.racks');
        }
        elseif(Auth::user()->role_id == User::adminRoleId){
            return redirect()->route('admin.get.racks');
        }
    }
}
