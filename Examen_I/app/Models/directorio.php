<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class directorio extends Model
{
    use HasFactory;

    public $table = 'directorio';
    public $primaryKey = 'codigoEntrada';
    public $timestamps = false;
    public $incrementing = false;
}
