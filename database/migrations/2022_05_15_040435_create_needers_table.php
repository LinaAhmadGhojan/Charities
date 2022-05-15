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
            $table->foreignId("id_user")->constrained("users");
            $table->foreignId("id_branch")->constrained("branch_charities");
            $table->enum("accept",["0","1"])->default("0");

            $table->index("id_user","id_branch");
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
