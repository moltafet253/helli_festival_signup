<?php

namespace App\Models\Helli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchType extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='research_types';
    protected $guarded=[];
}
