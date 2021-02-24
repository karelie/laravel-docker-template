<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_work', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('work_id');
            $table->timestamps();
        });

        Schema::table('user_work', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('work_id')->references('id')->on('works');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_work');
    }
}
