<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    use HasFactory;
    protected $table = "donatinos";
    public $timestamps = false;
    protected $fillable=[
        "id_charity",
        "id_user",
        "id_project",
        "first_name",
        "last_name",
        "donated_thing",
        "created_date",
        "type",
    ];
}
