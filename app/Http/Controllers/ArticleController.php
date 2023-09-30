<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Articles';
        $articles = Article::where('is_accepted', true)->latest();
        return view('articles.index', compact('title', 'articles'));
    }

    public function acceptArticle(Article $article)
    {
        $article->update([
            'is_accepted' => 1,
        ]);
        return redirect()->back()->with('message', 'Article successfully accepted');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Article';
        return view('articles.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticlesRequest $request)
    {
        $validatedData = $request->validated();
        $article = Article::create($request->all());
        $article->user_id = auth()->user()->id;
        $article->save();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $article->image = $request->file('image')->storeAs('public/images/' . $article->id, 'img_article.jpg');
            $article->save();
        }

        return redirect()->back()
            ->with(['success' => 'Article successfully added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $title = 'Show';
        return view('articles.show', compact('title', 'article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if ($article->user_id != auth()->user()->id && auth()->user()->is_admin != 1) {
            abort(403);
        }
        $title = 'Edit Article';
        return view('articles.edit', compact('title', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticlesRequest $request, Article $article)
    {
        //controllo permessi per editare articolo
        if (auth()->check() != true) {
            abort(403);
        }
        if ($article->user_id != auth()->user()->id && auth()->user()->is_admin != 1) {
            abort(403);
        }

        //validazione dei dati del form
        $validatedData = $request->validated();

        //update dei dati all'interno dell'articolo selezionato
        $article->update($request->all());
        return redirect()->back()
        ->with(['success' => 'Article successfully modified']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if(auth()->check() != true)
        {
            abort(403);
        }
        if ($article->user_id != auth()->user()->id && auth()->user()->is_admin != 1)
        {
            abort(403);
        }
        $article->delete();
        return redirect()->back()
        ->with(['success' => 'Article delete successfully']);
    }
}
