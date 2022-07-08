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
        Schema::create('service_charities', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_service")->constrained("services");
            $table->foreignId("id_charity")->constrained("charities");
            $table->timestamps();
            $table->index("id_service","id_charity");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_charities');
    }
};
