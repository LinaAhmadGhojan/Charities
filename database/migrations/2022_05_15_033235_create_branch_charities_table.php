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
        Schema::create('branch_charities', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_charity")->constrained("charities");
            $table->foreignId("id_city")->constrained("cities");
            $table->string("address");
            $table->index("id_city","id_charity");
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
        Schema::dropIfExists('branch_charities');
    }
};
