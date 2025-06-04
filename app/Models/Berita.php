<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'status',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        if ($this->gambar) {
            return asset($this->gambar);
        }
        return asset('images/default-news.png');
    }

    // Accessor for excerpt
    public function getExcerptAttribute()
    {
        return \Illuminate\Support\Str::limit(strip_tags($this->isi), 150);
    }

    // Scope for published berita
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Scope for draft berita
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }
}