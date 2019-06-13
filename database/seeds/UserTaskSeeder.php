<?php

use Illuminate\Database\Seeder;
use App\UserTask;

class UserTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
    	UserTask::truncate();
         factory(UserTask::class,3)->create();
    }
}
