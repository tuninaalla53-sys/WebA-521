<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    // Указываем, какие поля можно массово назначать
    protected $fillable = ['neighborhood_id', 'name', 'address', 'latitude', 'longitude'];

    // Связь "кофейня принадлежит району"
    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    // Связь "кофейня имеет много предложений"
    public function offers()
    {
        return $this->hasMany(CafeOffer::class);
    }
}