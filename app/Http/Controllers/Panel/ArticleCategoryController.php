<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\Category\CreateArticleCategoryRequest;
use App\Http\Requests\Article\Category\UpdateArticleCategoryRequest;
use App\Models\ArticleCategory;
use App\Repositories\ArticleCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ArticleCategoryRepository::all();

        return view('panel/article-category/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ArticleCategoryRepository::all();

        return view('panel.article-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleCategoryRequest $request)
    {
        $request = array_merge(($request->validated()), [
            'category_code' => uniq_code(ArticleCategory::class, 'category_code'),
            'status' => 1,
        ]);

        ArticleCategoryRepository::store($request);

        return response()->json([
            'message' => 'The category successfully created',
            'success' => true,
        ]);
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
    public function edit($id)
    {
        $category = ArticleCategoryRepository::where(['id' => $id]);

        if(! $category || empty($category)) return abort(404);

        $categories = ArticleCategoryRepository::all();

        return view('panel.article-category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleCategoryRequest $request, $id)
    {
        $exists = ArticleCategoryRepository::exists($id);

        if(! $exists) return abort(404);

        ArticleCategoryRepository::update($id, $request->validated());

        return response()->json([
            'message' => 'The category successfully updated',
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryCode)
    {
        ArticleCategoryRepository::delete($categoryCode);

        return redirect(route('panel.article-categories.index'));
    }
}
