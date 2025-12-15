<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        'text',
        'link',
        'icon'
    ];

    protected static function booted(): void
    {
        static::saved(function () {
            Cache::forget('contact');
        });

        static::deleted(function () {
            Cache::forget('contact');
        });
    }
}
