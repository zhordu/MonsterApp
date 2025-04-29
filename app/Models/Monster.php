<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{

    
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'danger_level',
        'sightings',
        'lat',
        'lng',
        'image_path'
    ];

    protected $casts = [
        'sightings' => 'integer',
        'lat' => 'float',
        'lng' => 'float',
    ];

    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return $this->image_path ? base64_encode($this->image_path) : null;
    }

    public function locations()
    {
        return $this->hasMany(MonsterLocation::class);
    }
}
