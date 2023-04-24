<?php

namespace App\Models\Helli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';
    protected $guarded = [];

    public function moshtarakan()
    {
        return $this->hasMany(Participant::class, 'post_id', 'id');
    }
}
