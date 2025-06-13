<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * Relasi: 1 kategori memiliki banyak berita
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
