<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id',
        'status',
        'category_code',
    ];

    public function articles()
    {
        $articles =  $this->hasMany(Article::class, 'category_id');

        return $articles->published();
    }

    public function childCategories()
    {
        return $this->hasMany(ArticleCategory::class, 'parent_id');
    }
}
