<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class RegistrationController extends Controller
{
    
    public function create(){
        return view("registration.create");
    }
    
    public function store(Request $request){
        $this->validate(request(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'mobile' => 'required|max:10|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        
        $user = User::create([
            'name' =>$request->input('name'),
            'email' =>$request->input('email'),
            'mobile' =>$request->input('mobile'),
            'password' => bcrypt($request->input('password')),
            'role_id' => $request->session()->get('role_id'),
            'section_id' =>$request->input('currentclass'),
        ]);
        
        
        auth()->login($user);
        
        return redirect("/home");
       // return redirect("storeperson/$user->id");
    }
    
    public function show(){
        return view("registration.select");
    }
    
    public function redirect(Request $request, $id){
        $request->session()->put('role_id', $id);
        return redirect("/register");
    }
}
