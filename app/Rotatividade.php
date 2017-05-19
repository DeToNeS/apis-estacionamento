<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rotatividade extends Model
{
    protected $table = 'rotatividade';

    protected $dates = ['entrada', 'saida', 'created_at', 'updated_at'];

    protected $fillable = [
        'cliente', 'tag', 'entrada', 'saida'
    ];
}