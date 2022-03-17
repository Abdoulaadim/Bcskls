<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ivisiteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'division',
        'service',
        'type',
        'description',
        'id_visiteur',       
    ];

}
