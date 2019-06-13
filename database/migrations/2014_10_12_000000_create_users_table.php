<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(false);
            $table->string('career')->nullable();
            $table->string('address')->nullable();
            $table->integer('experience')->nullable();
            $table->integer('age')->nullable();
            $table->string('skills')->nullable();
            $table->string('phone')->nullable();
            $table->string('list_of_tasks')->nullable();
            $table->string('image')->default("avatar.jpg");
            $table->string('links_social_media')->nullable();
            $table->integer('start_point')->default(1);
            $table->string('teams')->nullable();
            $table->string('projects')->nullable();
            $table->string('last_project');
            $table->integer('level');
            $table->string('tasks_compelete');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
