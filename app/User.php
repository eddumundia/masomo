<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile', 'role_id', 'section_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
   ];
   public function subject(){
        return $this->belongsTo(Subject::class);
    }
    
    public function section(){
        return $this->belongsTo(Sections::class);
    }
    
    public function role(){
        return $this->belongsTo(Role::class);
    }
    
    public function getcounts(){
        return [
            'students' => User::where(['role_id' =>1])->count(),
            'parents' => User::where(['role_id' =>2])->count(),
            'clerks' => User::where(['role_id' =>3])->count(),
            'teachers' => User::where(['role_id' =>4])->count(),
            'payments' => \DB::table('payments')->sum('amount'),

        ];
    }
    
    public function getStudentData($id){
       return [
           ''
       ];
    }
}
