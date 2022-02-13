<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;
    protected $table = 'halls';
    protected $fillable = [
        'name', 'capacity', 'location', 'google_location', 'advance'
    ];
    public function images()
    {
        return $this->hasMany('App\Models\HallImage');
    }
}
