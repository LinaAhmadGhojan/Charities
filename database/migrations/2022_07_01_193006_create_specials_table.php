<?php

use App\Models\Special;
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
        Schema::create('specials', function (Blueprint $table) {
            $table->id();
            $table->string("name_en");
            $table->string('name_ar');
            $table->timestamps();
        });


        $service = [
            ["name_en"=>"Special Care",
            "name_ar"=>"رعاية ذوي الحاجات الخاصة"
            ],
            ["name_en"=>"Medical Care",
            "name_ar"=>" رعاية طبية"
            ],
            ["name_en"=>"Humanities Cases",
            "name_ar"=>"حالات إنسانية"
            ],
            ["name_en"=>"Care of Pregnant and lactating"
            ,
            "name_ar"=>"رعاية الحوامل والمرضعات"],

            ["name_en"=>"Care of orphans",
            "name_ar"=>"رعاية الأيتام"
            ],

            ["name_en"=>"Care of elderly ",
            "name_ar"=>"رعاية المسنين"],


            ["name_en"=>"Care from Cancer",
            "name_ar"=>"رعاية مرضى السرطان"],

     

        ];

        foreach ($service as $key => $value) {
 
            $user = Special::create($value);
      
          }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specials');
    }
};
