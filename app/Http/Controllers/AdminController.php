<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Livewire\ListUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Create User';
        return view('admin.create-user', compact('title'));
    }

    public function category()
    {
        $title = 'Create Category';
        return view('admin.create-category', compact('title'));
    }

    public function listArticle(Article $article)
    {
        $title = 'List Articles';
        $articles = Article::all();
        return view('admin.list-articles', compact('articles','title'));
    }

}
