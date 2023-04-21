<?php

namespace App\Models\Helli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HelliUserMaxUploadPost extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='helli_user_max_upload_posts';
    protected $guarded=[];
}
