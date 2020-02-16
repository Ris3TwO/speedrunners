<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('names', 35);
            $table->string('last_names', 45);
            $table->string('age', 8);
            $table->string('email')->unique();
            $table->string('city', 20);
            $table->string('gender', 6);
            $table->string('shoes', 10);
            $table->string('team', 40);
            $table->string('distance', 6);
            $table->string('best_time', 10);
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
        Schema::dropIfExists('registrations');
    }
}
