<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use mysql_xdevapi\Table;

class EducationalInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='educational_infos';
    protected $guarded=[];

}
