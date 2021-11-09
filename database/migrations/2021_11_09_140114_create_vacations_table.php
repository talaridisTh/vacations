<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationsTable extends Migration {

    public function up()
    {
        Schema::create('vacations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('vacation_start');
            $table->date('vacation_end');
            $table->text('reason');
            $table->enum('status', ['pending', 'approved',"rejected"])->default("pending");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vacations');
    }

}