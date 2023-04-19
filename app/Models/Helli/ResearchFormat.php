<?php

namespace App\Models\Helli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchFormat extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='research_formats';
    protected $guarded=[];
}
