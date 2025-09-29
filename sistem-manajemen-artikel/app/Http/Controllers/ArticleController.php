<?php

namespace App\Http\Controllers;

use App\Models\Article;   // <-- ini penting
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('index', compact('articles'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
        ]);

        Article::create([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $user = auth()->user();

        if ($user->role === 'admin' || $article->user_id === $user->id) {
            $article->delete();
            return redirect()->route('articles.index')->with('success', 'Artikel dihapus');
        }

        return redirect()->route('articles.index')->with('error', 'Tidak punya izin hapus artikel ini');
    }
}
