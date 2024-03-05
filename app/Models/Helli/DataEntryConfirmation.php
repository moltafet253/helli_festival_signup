<?php

namespace App\Models\Helli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEntryConfirmation extends Model
{
    use HasFactory;
    protected $table='data_entry_confirmations';
    protected $fillable=[
        'user_id',
        'status'
    ];
    protected $hidden=[
        'created_at',
        'updated_at',
    ];
}
