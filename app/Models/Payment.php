<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'reservation_id', 'value', 'payment_method', 'user_id'
    ];
    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
