<?php

namespace App\Models\Helli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='images';
    protected $guarded=[];
    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
