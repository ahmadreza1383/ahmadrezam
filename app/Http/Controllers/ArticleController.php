<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //TODO dirty code
    public function index(Request $request)
    {
        if(! $request->has('name')){
            $articleCategories = ArticleCategoryRepository::all();

            $nameArticleCategories = $articleCategories->pluck('name');

            return view("articles.index", compact('nameArticleCategories'));
        }

        $name = $request->query('name');
        $articleCategories = ArticleCategoryRepository::where(['name' => $name]);

        if(! empty($nameArticleCategories)){
            $nameArticleCategories = collect($articleCategories->childCategories)->pluck('name');
        } else {
            $nameArticleCategories = [];
        }

        if(empty($articles = $articleCategories->articles)){
            $articles = [];
        }

        return view("articles.index", compact('nameArticleCategories', 'articles'));
    }

    public function show($articleCode)
    {
        $article = ArticleRepository::where(['article_code' => $articleCode])->first();
        if(! $article)
        {
            return abort(404);
        }

        $articles = Article::select([
            'title',
            'article_code'
        ])->limit(10)->get();

        $articleCategories = ArticleCategory::select([
            'name',
            'category_code'
        ])->limit(10)->get();

        return view("articles.show", compact('article', 'articleCategories', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
