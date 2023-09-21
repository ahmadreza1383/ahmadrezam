<?php
namespace App\Repositories;

use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleCategoryRepository
{
    public static function all()
    {
        return ArticleCategory::all();
    }

    public static function store($data)
    {
        return ArticleCategory::create($data);
    }

    public static function where(array $conditions)
    {
        return ArticleCategory::where($conditions)->first();
    }

    public static function exists($id)
    {
        return ArticleCategory::where('id', '=' ,$id)->exists();
    }

    public static function update($id, $data)
    {
        return ArticleCategory::where('id', '=' ,$id)->update($data);
    }

    public static function delete($code)
    {
        return ArticleCategory::where('category_code', '=' ,$code)->delete();
    }
}
?>
