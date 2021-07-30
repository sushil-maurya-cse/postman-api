<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiwers extends Model
{
    use HasFactory;
    protected $table='veiwers';
    protected $fillables=[
        'name',
        'place',
        'email',
        'fare'
    ];
}
