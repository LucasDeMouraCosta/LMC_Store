<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertise extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'title',   
        'slug',
        'price',
        'negotiable',
        'description',
        'views',
        'state_id',
        'user_id',
        'user_contact_id',
        'category_id',
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function state() : BelongsTo{
        return $this->belongsTo(State::class);
    }

    public function category() : BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(AdvertiseImage::class)->orderBy('sequence_number');
    }

    public function featured_image(){
        return $this->hasOne(AdvertiseImage::class)->where('sequence_number', 0);
    }

    public function user_contact(){
        return $this->belongsTo(UserContact::class);
    }

    protected function formattedPrice(): Attribute{
        return Attribute::make(
            get: fn ($value, $attributes) => number_format($attributes['price'], 2, ',', '.')
        );
    }
}
