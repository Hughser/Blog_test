<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Category;
use App\Model\Tag;
use App\Model\Message;
use Auth;
use Redirect;

/**
 * 文章.
 */
class ArticleController extends Controller
{
    /**
     * [show description].
     *
     * @param [int] $id [articles table id]
     *
     * @return [view] [an article]
     */
    public function show($id)
    {
        $article_data = Article::getArticle($id);
        $message = Message::getMessage($article_data->id);

        return View('show', compact('article_data', 'message'));
    }

    public function index()
    {
        $article_data = Article::getArticleList(9);

        return view('admin.article.index', compact('article_data'));
    }

    public function create()
    {
        $article_data = new Article();
        $category_date = Category::all();
        $tag_date = Tag::all();

        return view('admin.article.create', compact('article_data', 'category_date', 'tag_date'));
    }

    public function destroy(Request $request, $id)
    {
        $article = Article::find($id);
        $article->delete();
        if ($request->input('show', 0)) {
            return Redirect::route('home');
        } else {
            return Redirect::back();
        }
    }

    public function store(Request $request)
    {
        $article = Article::create([
          'title' => $request->input('title'),
          'body' => $request->input('markdown-body'),
          'html_body' => $request->input('html-body'),
          'category_id' => $request->input('category_select'),
          'user_id' => Auth::user()->id,
        ]);

        $article->tag()->sync($request->input('tag_list'));

        return Redirect::route('article.index');
    }

    public function edit($id)
    {
        $article_data = Article::with('tag')->find($id);
        $category_date = Category::all();
        $tag_date = Tag::all();
        $btn_name = '更新';

        return view('admin.article.create', compact('article_data', 'category_date', 'tag_date', 'btn_name'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->body = $request->input('markdown-body');
        $article->html_body = $request->input('html-body');
        $article->category_id = $request->input('category_select');
        $article->save();

        return Redirect::route('article.index');
    }

    public function garbage()
    {
        $article_data = Article::with('category', 'tag')->onlyTrashed()->latest()->paginate(9);

        return view('admin.article.delete', compact('article_data'));
    }

    public function recovery($id)
    {
        $article = Article::onlyTrashed()->find($id)->restore();

        return Redirect::route('article.garbage');
    }

    public function forceDelete($id)
    {
        $article = Article::onlyTrashed()->find($id)->forceDelete();

        return Redirect::route('article.garbage');
    }
}
