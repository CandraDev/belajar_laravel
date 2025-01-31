<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/siswa' . $this->cover))) {
            return unlink(public_path('images/siswa' . $this->cover));
        };
    }
}
