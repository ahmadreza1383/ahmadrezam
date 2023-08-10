<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'content',
        'article_code',
    ];

    public static $max = [
        'title' => 200,
    ];
}
