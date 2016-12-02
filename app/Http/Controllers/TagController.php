<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Tag;
use Redirect;
use Debugbar;

class TagController extends Controller
{
    /**
     * [tag article show].
     *
     * @param [string] $name [tags table name]
     *
     * @return [view] [a tag article]
     */
    public function show($name)
    {
        $article_data = Article::getArticleTag($name);

        return view('index', compact('article_data'));
    }

    public function index()
    {
        $tag_date = Tag::query()->latest()->paginate(9);

        return View('admin.tag.index', compact('tag_date'));
    }

    public function create()
    {
        return View('admin.tag.create');
    }

    public function store(Request $request)
    {
        $tag = new Tag([
          'name' => $request->input('tag_name'),
        ]);
        $tag->save();

        return Redirect::back();
    }

    public function update(Request $request,$id)
    {
        $tag = Tag::find($id);
        $tag->name=$request->input('name');
        $tag->save();
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
    }
}
