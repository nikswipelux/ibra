<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmcsTable extends Migration
{
    public function up()
    {
        Schema::create('cmcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('website')->unique();
            $table->string('telegram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('discord')->nullable();
            $table->string('price')->nullable();
            $table->string('market_cap')->nullable();
            $table->string('cmc_link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
