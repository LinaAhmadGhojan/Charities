<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'salary',
        'start',
        'first_name',
        'last_name',
        'id_country',
        'type',
        'email',
        'id_charity',
        'address',
        'birthday',
        'gender',
        'phone'

    ];
}
