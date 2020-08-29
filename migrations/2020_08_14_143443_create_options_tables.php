<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("options", function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('field_title');
            $table->string('field_key');
            $table->string('field_type');
            $table->string('field_properties');
            $table->string('field_value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("options");
    }
}
