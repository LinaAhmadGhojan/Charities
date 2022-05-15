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
        Schema::create('unsolve_problems', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_type_problem")->constrained("type_problems");
            $table->foreignId("id_charity")->constrained("charities");
            $table->enum("accept",["0","1"])->default("0");
            $table->enum("level",["1","2","3"])->default("3");

            $table->timestamps();
            $table->index("id_type_problem","id_charity");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unsolve_problems');
    }
};
