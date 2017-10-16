<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $users = \App\User::all();
        
        return view("users.index", compact('users'));
    }
    
    public function students(){
        $records = \App\User::where(['role_id' => 1])->get();
        return view('users.students', compact('records'));
    }
    
    public function parents(){
        $records = \App\User::where(['role_id' => 2])->get();
        return view('users.students', compact('records'));
    }
    
    public function staff(){
        $records = \App\User::where(['role_id' => 4])->get();
        return view('users.teachers', compact('records'));
    }
    
    public function clerks(){
        $records = \App\User::where(['role_id' => 3])->get();
        return view('users.clerks', compact('records'));
    }
    
    public function settings(){
        $subjects = \App\Subject::all();
        return view("users.settings", compact('subjects'));
    }
    /*
     * shows profile based on logged in person
     */
    
    public function profile(){
        $id = Auth()->user()->id;
        $user = \App\User::find($id);
        if($user->role_id == 1){
            $data = $user->getStudentData($id);
            $view ="student_profile";
        }else if($user->role_id == 2){
            $data = \App\User::where(['parent_id' => $user->id])->get();
           $view ="parent_profile"; 
        }else if($user->role_id == 3){
            $data ="";
           $view ="staff_profile"; 
        }else if($user->role_id == 4){
           $data ="";
           $view ="teacher_profile"; 
        }else{
           $data ="";
           $view ="teacher_profile"; 
        }
        
        return view("users.$view", compact('user', 'data'));
    }
    
    public function child($id){
        $user = \App\User::find($id);
        $data = \App\User::where(['parent_id' => $user->parent_id])->get();
        return view("users.student_profile", compact('user', 'data'));
    }
    
    public function teacherprofile($id){
        $user = \App\User::find($id);
      return view("users.teacher_profile", compact('user', 'data'));  
    }
    
     public function clerkprofile($id){
        $user = \App\User::find($id);
      return view("users.clerk_profile", compact('user', 'data'));  
    }
}
