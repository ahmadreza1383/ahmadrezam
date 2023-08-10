<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Article\CreateArticleRequest;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $list = ArticleRepository::get();
        return view("panel/article/list", compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateArticleRequest $request)
    {
        $request = $request->validated();

        $create = ArticleRepository::create(
            [
                'category_id' => 1,
                'title' => $request['title'],
                'content' => '',
                'article_code' => uniq_code(new Article(), 'article_code'),
            ]
        );

        return redirect(route('panel.article.edit', $create->article_code));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        return view("panel.article.create");
    }

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
        return redirect(route('panel.article'));

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
    public function update(Request $request, $code)
    {

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
        //
        article(ArticleRepository::where(['article_code' => $code]))
        ->update(['content' => $request->content]);

        echo "success";
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

        return redirect(route('panel.article'));
    }
}
