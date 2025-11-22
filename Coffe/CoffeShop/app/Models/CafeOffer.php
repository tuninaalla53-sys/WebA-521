<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeOffer extends Model
{
    use HasFactory;

    protected $fillable = ['cafe_id', 'bean_id', 'brew_method', 'price'];

    // Связь "предложение принадлежит кофейне"
    public function cafe()
    {
        return $this->belongsTo(Cafe::class);
    }

    // Связь "предложение принадлежит зерну"
    public function bean()
    {
        return $this->belongsTo(Bean::class);
    }
}