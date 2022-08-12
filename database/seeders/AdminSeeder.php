<?php

namespace Database\Seeders;

use App\Models\InformationUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
 

    }     //
    }

