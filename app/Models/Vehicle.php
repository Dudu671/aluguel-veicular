<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {
    protected $fillable = [
        'model',
        'year',
        'day_price',
        'image_path',
        'owner_id'
    ];

    public function vehicles() {
        return $this->belongsTo(User::class);
    }
}
