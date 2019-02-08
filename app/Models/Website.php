<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model

{
    protected $primaryKey = 'id';

    protected $fillable = [
        'rank',
        'url',
        'root',
        'links',
        'mozrank',
        'moztrust'
    ];
}

