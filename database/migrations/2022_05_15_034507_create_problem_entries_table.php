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
        Schema::create('problem_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user_enter")->constrained("users");
            $table->foreignId("id_type_problem")->constrained("type_problems");
            $table->foreignId("id_charity")->constrained("charities");
            $table->string("phone");
            $table->text("description");
            $table->string("first_name");
            $table->string("last_name");
            $table->text("attchment");
            $table->index("id_user_enter","id_type_problem");

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
        Schema::dropIfExists('problem_entries');
    }
};
