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
        Schema::create('benefactors', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user")->constrained("users");
            $table->foreignId("id_branch")->constrained("branch_charities");
            $table->date("date");
            $table->integer("quality");
            $table->timestamps();
            $table->index("id_user","id_branch");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefactors');
    }
};
