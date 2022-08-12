<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssemblyStock extends Model
{
    protected $table = "assembly__stock";
    use HasFactory;
    protected $fillable = [
          'type' ,
          'sum' ,
          'id_chartiy',


];
}
