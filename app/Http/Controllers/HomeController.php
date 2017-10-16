<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use \App\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new \App\User;
        if(\Auth::user()->role_id == 1){
            return redirect("users/profile");
        }
        
        $data =  $model->getcounts();
        return view('home', compact('data'));
    }
}
