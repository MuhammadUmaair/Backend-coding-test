<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCemployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cemployees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('people_id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('people_id')->references('id')->on('people');
            $table->foreign('group_id')->references('id')->on('company_groups');
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
        Schema::dropIfExists('cemployees');
    }
}
