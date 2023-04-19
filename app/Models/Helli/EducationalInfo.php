<?php

namespace App\Models\Helli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationalInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='educational_infos';
    protected $guarded=[];

}
