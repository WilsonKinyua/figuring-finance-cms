<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUssTable extends Migration
{
    public function up()
    {
        Schema::create('contact_uss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->longText('message');
            $table->timestamps();
        });
    }
}
