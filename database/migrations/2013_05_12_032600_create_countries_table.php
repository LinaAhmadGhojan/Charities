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
            $table->string("name_en");
             $table->string("name_ar");
            $table->timestamps();
           
        });

        $country = [
            ["name_en"=>"Damascus",
            "name_ar"=>"دمشق"
            ],
            ["name_en"=>"Rif_Damascus",
            "name_ar"=>"ريف دمشق"
            ],
            ["name_en"=>"Aleppo",
            "name_ar"=>"حلب"
            ],
            ["name_en"=>"Homos"
            ,
            "name_ar"=>"حمص"],
            ["name_en"=>"Hama",
            "name_ar"=>"حماة"
            ],
            ["name_en"=>"Hasaka",
            "name_ar"=>"الحسكة"],
            ["name_en"=>"Der alzoor",
            "name_ar"=>"دير الزور"],
            ["name_en"=>"Idleb",
            "name_ar"=>"إدلب"],
            ["name_en"=>"Swaida"
            ,
            "name_ar"=>"سويداء"],
            ["name_en"=>"Daraa'"
            ,
            "name_ar"=>"درعا"],

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
