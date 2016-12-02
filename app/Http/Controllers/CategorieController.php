<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Article;
use Redirect;

class CategorieController extends Controller
{
    /**
    * [categorie article show].
    *
    * @param [string] $name [categories table name]
    *
    * @return [view] [a categories article]
    */
   public function show($name)
   {
       $category_id = Category::getCategoryId($name);
       $article_data = Article::getArticleWhere('category_id', $category_id);

       return view('index', compact('article_data'));
   }

    public function index()
    {
        $category_date = Category::query()->latest()->paginate(9);;

        return View('admin.category.index', compact('category_date'));
    }

    public function create()
    {
      return View('admin.category.create');
    }

    public function store(Request $request)
    {
        $category = new Category([
          'name' => $request->input('category_name'),
        ]);
        $category->save();

        return Redirect::back();
    }

    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->name=$request->input('name');
        $category->save();
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
