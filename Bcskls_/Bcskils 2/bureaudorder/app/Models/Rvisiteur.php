<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rvisiteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'division',
        'service',
        'objet',
        'description',
        'name',
        'file_path',
        'id_visiteur',
    ];
}
