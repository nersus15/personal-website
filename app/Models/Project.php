<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    protected $fillable = [
        'name',
        'stack',
        'position',
        'description',
        'image',
        'link',
        'repo',
    ];

    protected static function booted(): void
    {
        static::saved(function () {
            Cache::forget('project');
        });

        static::deleted(function () {
            Cache::forget('project');
        });
    }
}
