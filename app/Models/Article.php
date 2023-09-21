<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function category()
    {
        return $this->hasOne(ArticleCategory::class, 'id', 'category_id');
    }

    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn($value) => base64_decode(htmlentities($value)),
            set: fn($value) => html_entity_decode(base64_encode($value)),
        );
    }
}
