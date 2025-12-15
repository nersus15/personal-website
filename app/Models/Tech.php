<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class Tech extends Model
{
    use HasFactory;

    protected $table = 'tech';

    protected $fillable = [
        'name',
        'category_id',
    ];

    protected static function booted(): void
    {
        static::saved(function () {
            Cache::forget('tech');
        });

        static::deleted(function () {
            Cache::forget('tech');
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
