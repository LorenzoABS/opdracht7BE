<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeVoertuig extends Model
{
    use HasFactory;

    protected $table = 'type_voertuigen';

    public $timestamps = false;

    protected $fillable = ['type_voertuig', 'rijbewijscategorie'];
}
