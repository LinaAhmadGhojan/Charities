<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InformationUser extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'id_country',
        'address',
        'birthday',
        'gender',
        'email',
        'phone',
     
    ];

}
