<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    protected $fillable = [
        'id',
        'name',
        'initials',
    ];

    public function users() : HasMany{
        return $this->hasMany(User::class);
    }

    public function advertises() : HasMany{
        return $this->hasMany(Advertise::class);
    }
}
