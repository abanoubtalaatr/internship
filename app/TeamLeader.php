<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamLeader extends Model
{
	 protected $fillable = [
        'first_name','last_name', 'email', 'password','phone'
    ]; 

    public function CurrentTeamLeader(){
       if(session()->has('id_teamleader')){
       return $this->find(session()->get('id_teamleader'));
       }
    }
}
