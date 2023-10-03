<?php

use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Database\Eloquent\Model;

if(! function_exists("uniq_code"))
{

    function uniq_code($model, $field){
        $model = app()->make($model);

        $random = random_int(1000000, 9999999);
        $check = true;
        while( $check === false ){
            $random = random_int(1000000, 9999999);
            $check = $model::where([$field => $random])->exists();
        }

        return $random;
    }
}

if(! function_exists("article"))
{
    function article($article)
    {
        return new ArticleRepository($article);
    }
}

if(! function_exists("articleState"))
{
    function articleState()
    {
        return config('view.article_state');
    }
}
