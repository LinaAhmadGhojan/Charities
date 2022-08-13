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
        Schema::create('project_charities', function (Blueprint $table) {
            $table->id();

            $table->foreignId("id_charity")->constrained("charities");

            $table->foreignId("id_project")->constrained("projects");
            $table->date("start");
            $table->date("end");

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
        Schema::dropIfExists('project_charities');
    }
};
