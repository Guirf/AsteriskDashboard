<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sippeer extends Model {

    protected $fillable = [
        'name',
        'type',
        'context',
        'secret',
        'transport',
        'dtmfmode',
        'disallow',
        'allow',
        'callerid',
        'dynamic'
    ];


    use HasFactory;
}
