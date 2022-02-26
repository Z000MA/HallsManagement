<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'customer_name', 'date', 'hall_id', 'period_id', 'state_id'
    ];
    public function hall()
    {
        return $this->belongsTo('App\Models\Hall');
    }
    public function period()
    {
        return $this->belongsTo('App\Models\Period');
    }
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
    public function services()
    {
        return $this->hasMany('App\Models\OrderService');
    }
}
