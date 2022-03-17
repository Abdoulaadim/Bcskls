<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csortant extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference',
        'objet',
        'type',
        'expiditeur',
        'destinataire',
        'division',
        'service',
        'employee',
        'etat',
        'depart',
              
    ];
}
