<?php

use App\Models\Country;
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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
            $table->index("name");
        });

        $country = [
            ["name"=>"Damascus"],
            ["name"=>"Aleppo"],
            ["name"=>"Homos"],
            ["name"=>"Hama"],
            ["name"=>"Hasaka"],
            ["name"=>"Der alzoor"],
            ["name"=>"Idleb"],
            ["name"=>"Swaida"],
            ["name"=>"Daraa'"],

        ];

        foreach ($country as $key => $value) {
 
            $user = Country::create($value);
      
          }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
