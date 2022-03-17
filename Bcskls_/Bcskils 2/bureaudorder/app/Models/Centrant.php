<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centrant extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference',
        'objet',
        'type',
        'expiditeur',
        'division',
        'service',
        'employee',
        'etat',
        'depart',
              
    ];
}
