<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Admin');
            $table->string('username')->unique()->default('4dm!n_kp!R4');
            $table->string('password')->default('$2a$12$xHlW7jB4J3gmH/HdpC5CF.O4PMrXdu8BEZq.9c3ClRfUHZadtAjRG');
            $table->enum('study_status',['aktif','lulus']);
            $table->enum('vote_status',['belum','sudah']);
            $table->string('study_program');
            $table->enum('gender',['L','P']);
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
};
