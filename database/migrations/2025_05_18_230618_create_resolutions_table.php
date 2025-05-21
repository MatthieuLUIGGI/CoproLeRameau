<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('resolutions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('vote_start_date');
            $table->date('vote_end_date');
            $table->enum('status', ['pending', 'approved', 'rejected', 'abstained'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resolutions');
    }
};