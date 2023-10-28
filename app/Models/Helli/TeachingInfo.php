<?php

namespace App\Models\Helli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeachingInfo extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='teaching_infos';
    protected $guarded=[];
    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
