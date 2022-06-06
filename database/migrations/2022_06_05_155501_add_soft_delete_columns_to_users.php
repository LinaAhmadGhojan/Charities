<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum("role",["admin","user"])->default("user");
            $table->softDeletes();
            $table->index("role");

        });

        
        $users = [
            [ 'first_name' => 'admin',
            'last_name' => 'admin',
             'email' => 'admin@gmail.com',
             'password' => Hash::make('admin'),
             'id_country'=>'1',
             'birthday'=>'2000-8-8',
             'role'=>'admin',
            'gender'=>'male',
            'address' => 'almaza',
         ],
 
     ];
 
  
     foreach ($users as $key => $value) {
 
       $user = User::create($value);
 
     }
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
