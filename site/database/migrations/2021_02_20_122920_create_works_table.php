<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('status')->nullable();
            $table->string('cover')->nullable();
            $table->string('description')->nullable();
            $table->json('content')->nullable();
=======
>>>>>>> afe9d47c2fe91d6a745d190b7d7229ef32ff4741
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
        Schema::dropIfExists('works');
    }
}
