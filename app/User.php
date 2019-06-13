<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\Project;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','age','career','address','skills','experience','phone','links_social_media',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  
    public function CurrentUser(){
        
        if(Auth::check()){
            return $this->find(Auth::id());
        }elseif (session()->has('user_id')) {
            return $this->find(session()->get('user_id'));
        }else{
            return 'welcome';
        }
    
  }// end function CurrentUser

  public function ExcellentLevel(){
    return  $this->where('level',1)->get();
  }

  public function IntermediateLevel(){
    return  $this->where('level',2)->get();
  }

  public function EnteryLevel(){
    return  $this->where('level',3)->get();
  }

  public function UserHasThisProject(){
    $Project = new Project;
    $GetProject = $Project->GetProjects();

  }//UserHasThisProject

}//class 
