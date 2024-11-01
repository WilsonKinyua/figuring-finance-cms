<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('module');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });
    }
}
