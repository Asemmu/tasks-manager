<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
    'name',
    'priority',
    'status',
    'date',
    'user_id',
    'comments',
    ];
}
