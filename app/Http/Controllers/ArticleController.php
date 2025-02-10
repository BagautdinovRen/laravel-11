<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(): ArticleCollection
    {
        return new ArticleCollection(Article::all());
    }

    public function create()
    {

    }

    public function store(StoreRequest $request)
    {
        $article = new Article();

        $article->title = \Illuminate\Support\Str::random(10);
        $article->slug = \Illuminate\Support\Str::slug($article->title);
        $article->content = \Illuminate\Support\Str::random(500);
        $article->data = $request->get('data');

        $article->author_id = 1;
        $article->save();
        var_dump($article->data);
        $article = Article::findOrFail($article->id);
        //var_dump($article->data);dd();
        return $article;
    }

    public function show(string $id): ArticleResource
    {
        return new ArticleResource(Article::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
