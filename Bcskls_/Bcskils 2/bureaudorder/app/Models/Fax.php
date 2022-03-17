<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fax extends Model
{
    use HasFactory;
    protected $fillable = [
    'numfax',
    'telefax',
    'telephone',
    'emetteur',
    'recepteur',
    'datefax',
    'objet',
    'description',
    'name',
    'file_path',     
    ];

  
}
