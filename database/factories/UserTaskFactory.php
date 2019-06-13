<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\UserTask;

$factory->define(UserTask::class, function (Faker $faker) {
    
   return [
        "id_user"=>1,
        "id_task"=>"",
        "start_task"=>"",
        "End_task"=>"",
        "delivery"=>"",
        "notes"=>"",
        "degree"=>mt_rand(1,20),
        "total_degree"=>mt_rand(1,20),
    ];
});
