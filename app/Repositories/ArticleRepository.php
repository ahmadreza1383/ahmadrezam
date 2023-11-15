<?php
namespace App\Repositories;

use App\Models\Article;

class ArticleRepository{

    public static $article = [];

    public function __construct($article)
    {
        self::$article = $article;
    }

    public static function latests($limit = 10, $offset = 0)
    {
        $articles = Article::orderByDesc('id')->offset($offset)->limit($limit)->get();

        return $articles;
    }

    /**
     * Get all column
     */
    public static function get($with = [])
    {
        if(empty($with)) return Article::all();

        return Article::with($with)->get();
    }

    /**
     * Delete column
     */
    public static function delete()
    {
        self::$article->delete();
    }

    /**
     * Update column
     * @param array $array  array list for update
     */
    public static function update(array $array)
    {
        return self::$article->update($array);
    }

     /**
     * Create column
     * @param array $array  array list for create
     */
    public static function create(array $array)
    {
        return Article::create($array);
    }

     /**
     * Where column
     * @param array $array  array list for where
     */
    public static function where(array $conditions)
    {
        return Article::where($conditions);
    }
}
?>
