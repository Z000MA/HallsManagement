<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'hall_id', 'name', 'price', 'description', 'required'
    ];
    public function hall()
    {
        return $this->belongsTo('App\Models\Hall');
    }
}
