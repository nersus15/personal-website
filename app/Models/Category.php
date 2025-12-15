<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
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

    public function techs(): HasMany
    {
        return $this->hasMany(Tech::class, 'category_id');
    }
}
