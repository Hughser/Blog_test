@extends('layout')
@section('content')
<div class="col-md-8">
    <div class="pull-right">
      @if (Auth::check() and Auth::user()->isAdmin())
        <a class="btn btn-primary" href="{{route('article.create')}}" target="_blank">新增文章</a>
      @endif
    </div>
    @foreach ($article_data as $key => $article)
    <div class="col-md-12 panel panel-default">
        <a class="text-primary" href="{{route('article.show',['id'=>$article->id])}}">
            <h1>
              {{$article->title}}
          </h1>
        </a>
        <div class="blog-post-meta">
          <div class="col-md-8">
            分類：
            <span class="badge">
              <a style="color:white;" href="{{route('categorie.show',['name'=>$article->category->name])}}">
                  {{$article->category->name}}
              </a>&nbsp
            </span>&nbsp
            標籤：
            @foreach($article->tag as $key => $tag)
            <span class="badge">
               <a style="color:white;" href="{{route('tag.show',['name'=>$tag->name])}}">
                    {{$tag->name}}
              </a>&nbsp
            </span>&nbsp
            @endforeach
          </div>
          <div class="col-md-4">
            <div class="pull-right">
              時間： {{$article->created_at}}
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <hr style="margin:10px 0;"/>
            <p class="lead text-muted">
              {!!str_limit($article->html_body, $limit = 300, $end = '...')!!}
            </p>
        </div>
        <div class="col-md-8 message">
            <form action="{{route('article.destroy',['id'=>$article->id])}}" method="post">
              {{$article->message->count()}}&nbsp則留言
              @if (Auth::check() and Auth::user()->isAdmin())
              <a class="btn btn-xs btn-primary" href="{{route('article.edit',['id'=>$article->id])}}" target="_blank">
                  <span style="padding-left: 5px;">編輯文章</span>
              </a>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-xs btn-danger">
                <span style="padding-left: 5px;">刪除文章</span>
              </button>
              @endif
            </form>
        </div>
        {{-- 繼續 --}}
        <div class="col-md-2 pull-right">
          <a href="{{route('article.show',['id'=>$article->id])}}">
            繼續閱讀...
          </a>
        </div>
    </div>
    @endforeach
    <div class="pull-right">
        {!! $article_data->render() !!}
    </div>
</div>
@stop
