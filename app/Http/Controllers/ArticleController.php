<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        // Get articles
        $articles = Article::paginate(15);

        // Return collection of articles as a resource
        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return ArticleResource
     */
    public function store(Request $request)
    {
        $article = new Article;

        $article->id = $request->input('id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');

        if ($article->save()) {
            return new ArticleResource($article);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return ArticleResource
     */
    public function show($id)
    {
        // Get article
        $article = Article::findOrFail($id);

        // Return single article as resource
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return ArticleResource
     */
    public function update(Request $request, $id)
    {
        // Get article
        $article = Article::findOrFail($id);

        $article->title = $request->input('title');
        $article->body = $request->input('body');

        if ($article->save()) {
            return new ArticleResource($article);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return ArticleResource
     */
    public function destroy($id)
    {
        // Get article
        $article = Article::findOrFail($id);

        // Return single article as resource
        if ($article->delete()) {
            return new ArticleResource($article);
        }
    }
}
