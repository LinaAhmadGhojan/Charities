<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnsolveProblem extends Model
{
    use HasFactory;
    protected $fillable=[
        "id_type_problem",
        "id_charity",
        "accept",
        "level"

    ];
}
