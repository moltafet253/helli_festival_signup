<?php

namespace App\Models\Helli;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function moshtarakan()
    {
        return $this->hasMany(Participant::class, 'post_id', 'id');
    }

    public function personInfo()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
