<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationService extends Model
{
    use HasFactory;
    protected $table = 'reservation_services';
    protected $fillable = [
        'reservation_id', 'service_id', 'price'
    ];
    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation');
    }
    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
