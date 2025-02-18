<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{

    public $guarded = ['id'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
