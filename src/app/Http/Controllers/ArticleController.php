<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }
    public function index()
    {
        $articles = Article::all()->sortByDesc('create_at');

        return view('articles.index', ['articles' => $articles]);
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store(ArticleRequest $request)
    {
        $items = $request->only(['title', 'body']);

        Article::create([
            'title' => $items['title'],
            'body' => $items['body'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('articles.index');
    }
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect()->route('articles.index');
    }
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }
}
