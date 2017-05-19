<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vagas extends Model
{
    protected $fillable = [
        'total', 'disponiveis'
    ];
}