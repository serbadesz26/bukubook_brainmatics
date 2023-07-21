<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = [
        'cover_url'
    ];

    /**
     * Get Cover URL
     *
     * @param  string  $value
     * @return string
     */
    public function getCoverUrlAttribute()
    {
        $cover = $this->cover;
        if (!str_contains($cover, 'http')) {
            return asset('storage/' . $cover);
        }
        return $cover;
    }

    // Relasi ke categories, satu buku merujuk ke banyak kategori
    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'book_category',
            'book_id',
            'category_id'
        )->withPivot([
            'updated_at' //misal butuh tambahan field dari tabel pivot
        ]);
    }
}
