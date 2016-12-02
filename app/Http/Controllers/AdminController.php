<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Category;
use App\Model\Tag;
use Auth;
use Redirect;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return View('login');
        } elseif (Auth::user()->isAdmin()) {
            $article_count=Article::all()->count();
            $category_count=Category::all()->count();
            $tag_count=Tag::all()->count();
            return View('admin.index',compact('article_count','category_count','tag_count'));
        }

    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return Redirect::route('backstage');
        } else {
            return Redirect::route('backstage')->withErrors('帳密錯誤');
        }
    }
}
