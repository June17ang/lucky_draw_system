<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WinningNumber extends Model
{
    protected $fillable = [
        'user_id', 'number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
