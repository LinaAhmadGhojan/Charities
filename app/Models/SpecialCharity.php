<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialCharity extends Model
{
    use HasFactory;
    protected $fillable=[
        "id_special",
        "id_charity"
    ];
}
