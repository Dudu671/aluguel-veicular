<?php

namespace App\Models;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }
}
