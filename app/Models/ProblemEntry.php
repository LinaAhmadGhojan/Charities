<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemEntry extends Model
{
    use HasFactory;
    protected $fillable=[
        "id_type_problem",
        "id_user_enter",
        "id_charity",
        "phone",
        "description",
        "first_name",
        "last_name",
        "attchment",
        "status"



    ];
}
