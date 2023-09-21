<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Article\CreateArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Repositories\ArticleCategoryRepository;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = ArticleRepository::get('category');

        return view("panel/article/index", compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories = ArticleCategoryRepository::all();

        return view("panel.article.create", compact('categories'));
    }

    public function store(CreateArticleRequest $request)
    {
        $request = $request->validated();

        $articleCategory = ArticleCategoryRepository::where(['category_code' => $request['category_code']]);

        $create = ArticleRepository::create(
            [
                'category_id' => $articleCategory->id,
                'title' => $request['title'],
                'content' => '',
                'article_code' => uniq_code(Article::class, 'article_code'),
            ]
        );

        return redirect(route('panel.articles.edit', $create->article_code));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($code)
    {
        $article = ArticleRepository::where(['article_code' => $code]);

        if($article->exists() == false)
        return redirect(route('panel.articles'));

        $row = $article->first();

        if(empty($row->content)){
            $row->content = "<h2>edit article $row->title....</h2>";
        }

        return view('panel.article.content', compact('row'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $code)
    {
        ArticleRepository::where(['article_code' => $code])->update($request->validated());

        return response()->json([
            'message' => 'The article successfully created',
            'success' => true,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    public function updateContent(Request $request, $code)
    {
        $article = ArticleRepository::where(['article_code' => $code])->first();
        if(empty($article)) return abort(404);
        $article->content = $request->content;
        $article->save();

        return response(status:200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($articleCode)
    {
        article(ArticleRepository::where(['article_code' => $articleCode]))->delete();

        return redirect()->route('panel.articles.index');
    }
}
