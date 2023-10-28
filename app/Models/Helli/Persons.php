<?php

namespace App\Models\Helli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    use HasFactory;
    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
