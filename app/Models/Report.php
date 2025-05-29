<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'location',
        'description',
        'media_path',
        'status',
    ];

    // Relasi ke pengguna (pelapor)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke kategori fasilitas
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
