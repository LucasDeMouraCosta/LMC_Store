<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserContact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'label',
        'number',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function advertises(){
        return $this->hasMany(Advertise::class);
    }
}
