<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue_member extends Model {

    protected $fillable = [
        'queue_name',
        'interface',
        'membername'
    ];


    use HasFactory;
}
