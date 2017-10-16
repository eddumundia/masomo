<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Person;

class SessionController extends Controller
{
    
    public function create(){
        return view('sessions.create');
    }
    
    public function destroy(){
        auth()->logout();
        return redirect('/');
    }
    
    public function store(){
        if(!auth()->attempt(['email'=> request('email'), 'password' => request('password')])){
            return back()->withErrors([
                'message' => "please check your credentials and try again"
            ]);
        }
        
        return redirect('home');
    }
    
    public function storeperson(Request $request, $id){
        $person  = new \App\Participant();
        $person->user_id = $id;
        $person->role_id =  $request->session()->get('role_id');
        $person->save();
        
        return redirect("/home");
    }
}
