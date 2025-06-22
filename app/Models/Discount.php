<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['user_id', 'percentage', 'used', 'code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
