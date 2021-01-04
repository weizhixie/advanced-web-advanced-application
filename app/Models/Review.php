<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'rating',
        'user_id',
        'snack_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function snack()
    {
        return $this->belongsTo(Snack::class);
    }
}
