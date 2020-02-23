<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanamaRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panama_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('names', 35);
            $table->string('last_names', 45);
            $table->string('age', 10);
            $table->string('email')->unique();
            $table->string('gender', 10);
            $table->string('shoes', 10);
            $table->string('team', 40);
            $table->string('distance', 6);
            $table->string('best_time', 10);
            $table->boolean('email_notices')->nullable()->default(false);
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
        Schema::dropIfExists('panama_registrations');
    }
}
