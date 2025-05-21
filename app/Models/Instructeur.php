<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Voertuig; // Voeg deze import toe

class Instructeur extends Model
{
    use HasFactory;

    public function voertuigen()
    {
        return $this->belongsToMany(Voertuig::class, 'voertuig_instructeur', 'instructeur_id', 'voertuig_id');
    }
}