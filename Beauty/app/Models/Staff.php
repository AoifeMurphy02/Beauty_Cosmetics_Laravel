<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id','artist_name', 'position','email'
    ];
    protected $primaryKey = 'staff_id';

    public function appointments()
    {
        
        return $this->hasMany(Appointment::class);
    }
}
