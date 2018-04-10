<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Booster extends Model
{
    //

    protected $fillable = [
        'title', 'verse', 'confession', 'color',
    ];
}
