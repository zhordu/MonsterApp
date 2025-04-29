<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonsterSighting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'monster_name',
        'category',
        'description',
        'danger_level',
        'lat',
        'lng',
        'location_name',
        'sighting_time',
        'verified',
        'image'
    ];

    protected $casts = [
        'danger_level' => 'string',
        'verified' => 'boolean',
        'sighting_time' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}