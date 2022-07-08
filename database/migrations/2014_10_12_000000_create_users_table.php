<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
     
            
            $table->id();
            $table->foreignId('id_information')->constrained("information_users");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('email')->unique();
            $table->enum("role",["admin","user"])->default("user");
            $table->softDeletes();
            $table->index("role");

            $table->rememberToken();
            $table->timestamps();
        });




        $users = [
            [ 
             'password' => Hash::make('admin'),
             'role'=>'admin',
             'id_information'=>'1',
             'email' =>'admin@gmail.com'

            ],

 
     ];

     
 
     foreach ($users as $key => $value) {   
       $user = User::create($value);  }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
