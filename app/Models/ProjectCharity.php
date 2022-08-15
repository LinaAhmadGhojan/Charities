<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCharity extends Model
{
    use HasFactory;
    protected $table = "project_charities";
    protected $fillable=[
        "id_project",
        "id_charity",
        "start",
        "end",
        "description",
        "type",
        "title",
    ];
}
