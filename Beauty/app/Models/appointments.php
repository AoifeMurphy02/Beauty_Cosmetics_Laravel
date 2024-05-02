<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
  
    use HasFactory;
    protected $fillable = ['staff_id', 'customer_id', 'service_id', 'time', 'date'];

}
