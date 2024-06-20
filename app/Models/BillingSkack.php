<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingSkack extends Model
{
    use HasFactory;
    protected $table = "billing_skacks";
    protected $primaryKey = "id";
}