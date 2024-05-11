<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = [
       'service_id', 'service_name', 'service_description','service_price'
    ];

    protected $primaryKey = 'service_id';

    
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
