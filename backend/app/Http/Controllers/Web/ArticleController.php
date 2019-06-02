<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $articles = Article::with('tags')->get();
        return response()->json(compact('articles'));
    }

    public function store(Request $request)
    {
        $article = Article::create(array_merge([
            'user_id' => 2,
        ], $request->only('title', 'text')));
        return response()->json($article->id);
    }

    public function read(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->tags = $article->tags;
        return response()->json($article);
    }

    public function update(Request $request, $id)
    {
        Article::findOrFail($id)->update($request->only('title', 'text'));
        return response()->json([]);
    }

    public function delete(Request $request, $id)
    {
        Article::destroy($id);
        return response()->json([]);
    }

}
