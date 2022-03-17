<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class S_Visiteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'division',
        'service',
        'employee',
        'description',
        'id_visiteur',   
       ];
}
