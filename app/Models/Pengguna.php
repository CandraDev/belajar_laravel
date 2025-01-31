<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengguna extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    // public $with = ['telepon'];

    public function telepon()
    {
        return $this->hasOne(Telepon::class);
    }
}
