<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function formattedNumber(): Attribute{
        return Attribute::make(
            get: fn ($value, $attributes) => preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $attributes['number'])
        );
    }
}
