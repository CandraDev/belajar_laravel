<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    /**
     * Get the penerbit that owns the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penerbit(): BelongsTo
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit');
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'id_genre');
    }

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'id_buku');
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/siswa' . $this->cover))) {
            return unlink(public_path('images/siswa' . $this->cover));
        };
    }
}