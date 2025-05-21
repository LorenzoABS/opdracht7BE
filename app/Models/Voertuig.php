<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voertuig extends Model
{
    use HasFactory;

    // Specificeer de tabelnaam
    protected $table = 'voertuigen';

    protected $fillable = [
        'type_voertuig_id',
        'type',
        'kenteken',
        'bouwjaar',
        'brandstof',
    ];

    public function instructeurs()
    {
        return $this->belongsToMany(Instructeur::class, 'voertuig_instructeur', 'voertuig_id', 'instructeur_id');
    }

    public function type_voertuig()
    {
        return $this->belongsTo(TypeVoertuig::class, 'type_voertuig_id');
    }
}
