<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;

    protected $fillable = [
        'conducteur_id',
        'lieu_depart',
        'lieu_arrive',
        'date',
        'heure',
        'nombre_places',
        'prix',
        'status',
    ];

    public function conducteur() {
        
        return $this->belongsTo(User::class, 'conducteur_id');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'trajet_id');
    }
}
