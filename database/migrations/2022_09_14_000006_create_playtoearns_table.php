<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaytoearnsTable extends Migration
{
    public function up()
    {
        Schema::create('playtoearns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_link')->nullable();
            $table->string('name')->nullable();
            $table->string('status')->nullable();
            $table->string('nft_support')->nullable();
            $table->string('blockchain')->nullable();
            $table->string('website')->nullable();
            $table->string('twitter')->nullable();
            $table->string('discord')->nullable();
            $table->string('telegram')->nullable();
            $table->integer('total_rank')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
