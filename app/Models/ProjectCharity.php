<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCharity extends Model
{
    use HasFactory;
    protected $fillable=[
        "id_project",
        "id_branch",
        "start",
        "end",
        "description",
    ];
}
