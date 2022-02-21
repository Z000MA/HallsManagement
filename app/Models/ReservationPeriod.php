<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationPeriod extends Model
{
    use HasFactory;
    protected $table = 'reservation_periods';
    protected $fillable = [
        'name', 'start', 'end'
    ];
    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }
}
