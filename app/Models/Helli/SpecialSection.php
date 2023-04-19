<?php

namespace App\Models\Helli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialSection extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='special_sections';
    protected $guarded=[];
}
