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
        Schema::create('needers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_information")->constrained("information_users");
            $table->foreignId("id_charity")->constrained("charities");
            $table->string('start'); 
            $table->enum("accept",["0","1"])->default("0");
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
        Schema::dropIfExists('needers');
    }
};
