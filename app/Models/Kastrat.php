<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kastrat extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $table = "kastrat";
}
