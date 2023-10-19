<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('assets_id');
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('company_group_id')->nullable();
            $table->foreign('location_id')->references('id')->on('clocations');
            $table->foreign('assets_id')->references('id')->on('assets');
            $table->foreign('manager_id')->references('id')->on('managers');
            $table->foreign('employee_id')->references('id')->on('cemployees');
            $table->foreign('company_group_id')->references('id')->on('company_groups');
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
        Schema::dropIfExists('companies');
    }
}
