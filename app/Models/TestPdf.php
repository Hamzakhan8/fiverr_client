<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPdf extends Model
{
    protected $table='test';
    protected $fillable=([
        'name',
        'firstname',
        'lastname',

    ]);
    use HasFactory;
}
