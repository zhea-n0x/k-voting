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
        Schema::create('bems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('study_program');
            $table->string('photo');
            $table->string('visi');
            $table->string('misi');
            $table->string('no_urut');
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
        Schema::dropIfExists('bems');
    }
};
