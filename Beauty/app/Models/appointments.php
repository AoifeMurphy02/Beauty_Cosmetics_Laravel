<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $primaryKey = 'appointment_id';
    protected $fillable = ['staff_id', 'customer_id', 'service_id', 'time', 'date'];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id'); // the second parameter 'staff_id' matches the foreign key used in the 'appointments' table.
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'service_id');
    }
}

