<?php

use App\Models\Service;
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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string("name_en");
            $table->string('name_ar');
            $table->timestamps();
        });


        $service = [
            ["name_en"=>"Free Cloths",
            "name_ar"=>"ملابس مجانية"
            ],
            ["name_en"=>"Free Medicines",
            "name_ar"=>" أدوية مجانية"
            ],
            ["name_en"=>"Food Steel",
            "name_ar"=>"سلل غذائية"
            ],
            ["name_en"=>"
            free Health detection"
            ,
            "name_ar"=>"كشف صحي مجاني"],

            ["name_en"=>"Physical Treatment",
            "name_ar"=>"علاج فيزيائي"
            ],

            ["name_en"=>"Physical Activites ",
            "name_ar"=>"أنشطة فيزيائية"],


            ["name_en"=>"Material Help",
            "name_ar"=>"مساعدات مادية"],

     

        ];

        foreach ($service as $key => $value) {
 
            $user = Service::create($value);
      
          }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
