<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    protected $fillable = [
        'hall_id',
        'customer_id',
        'period_id',
        'date',
        'sub_total',
        'discount',
        'total',
        'user_id',
        'state_id'
    ];
    public function hall()
    {
        return $this->belongsTo('App\Models\Hall');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }
    public function period()
    {
        return $this->belongsTo('App\Models\ReservationPeriod');
    }
    public function services()
    {
        return $this->hasMany('App\Models\ReservationService');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
}
