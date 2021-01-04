<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'popularity',
        'description',
        'snackImage',
        'user_id'
    ];

    public function getPathAttribute()
    {
        return $this->path();
    }
    public function path()
    {
        return '/snack/' . $this->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
