<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manu extends Model
{
    use HasFactory;
    protected $table = "manus";
    protected $primaryKey = "id";
}