<?php

namespace App\Http\Controllers;

use App\Model\Article;
use Request;

/**
 * index.
 */
class IndexController extends Controller
{
    /**
     * [article list].
     *
     * @return [view] [article list]
     */
    public function index()
    {
        $article_data = Article::getArticleList(7);

        return view('index', compact('article_data'));
    }

    /**
     * [search keyword article].
     *
     * @return [view] [keyword article]
     */
    public function search()
    {
        $keyword = Request::get('keyword');
        $article_data = Article::getKeyWord($keyword);

        return view('index', compact('article_data'));
    }
}
