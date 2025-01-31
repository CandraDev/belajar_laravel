<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bukus(): HasMany
    {
        return $this->hasMany(Buku::class, 'id_genre');
    }
}