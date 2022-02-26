<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    use HasFactory;
    protected $table = 'order_services';
    protected $fillable = [
        'order_id', 'service_id', 'price', 'qty', 'sub'
    ];
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
