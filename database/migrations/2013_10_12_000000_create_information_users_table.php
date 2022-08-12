<?php

use App\Models\InformationUser;
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
        Schema::create('information_users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->foreignId('id_country')->constrained("countries");
            $table->text('address');
            $table->date("birthday");
            $table->enum("gender",["male","female"]);
            $table->softDeletes();
            $table->timestamps();
        });


        $users = [
            [ 'first_name' => 'admin',
            'last_name' => 'admin',
             'email' => 'admin@gmail.com',
           //  'password' => Hash::make('admin'),
             'id_country'=>'1',
             'birthday'=>'2000-8-8',
             //'role'=>'admin',
            'gender'=>'male',
            'address' => 'almaza',
         ],
 
     ];
 
  
     foreach ($users as $key => $value) {
 
       $user = InformationUser::create($value);
 
     }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_users');
    }
};
