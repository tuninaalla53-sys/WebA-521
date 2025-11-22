<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bean extends Model
{
    use HasFactory;

    protected $table = 'beans';
    
    protected $fillable = [
        'roaster_id', 'name', 'origin', 'process', 
        'roast_level', 'description'
    ];

    public $timestamps = true;

    public function roaster()
    {
        return $this->belongsTo(Roaster::class, 'roaster_id');
    }

    public function cafeOffers()
    {
        return $this->hasMany(CafeOffer::class, 'bean_id');
    }
}