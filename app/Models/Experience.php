<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experience';

    protected $fillable = [
        'name',
        'company',
        'description',
        'from',
        'until',
        'status',
    ];

    protected $casts = [
        'from' => 'date',
        'until' => 'date',
    ];

    protected static function booted(): void
    {
        static::saved(function () {
            Cache::forget('experience');
        });

        static::deleted(function () {
            Cache::forget('experience');
        });
    }
}
