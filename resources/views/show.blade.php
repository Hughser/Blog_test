@extends('layout')
{{-- content bar  --}}
@section('content')
  <div class="col-md-8">
      {{-- article title --}}
      <a class="text-primary" href="{{route('article.show',['id'=>$article_data->id])}}">
          <h1>
            {{$article_data->title}}
        </h1>
      </a>
      {{-- article meta --}}
      <div class="blog-post-meta">
        <div class="col-md-8">
          分類：
          <a href="/categorie/{{ $article_data->category->name }}">
            <span class="badge">
              {{$article_data->category->name}}
            </span>
          </a>&nbsp
          標籤：
           @foreach($article_data->tag as $key => $tag)
            <a href="/tag/{{$tag->name}}">
              <span class="badge">
                {{$tag->name}}
              </span>
            </a>&nbsp
           @endforeach
        </div>
        <div class="col-md-4">
          <div class="pull-right">
            時間： {{$article_data->created_at->diffForHumans()}}
          </div>
        </div>
      </div>
      {{-- article body --}}
      <div class="col-md-12">
        <hr style="margin:10px 0;"/>
        <font class="lead article-text">
            {!! $article_data->html_body !!}
        </font>
      </div>
      <div class="col-md-12 span-menu">
        <hr style="margin:10px 0;"/>
        <form action="{{route('article.destroy',['id'=>$article_data->id])}}" method="post">
          @if (Auth::check() and Auth::user()->isAdmin())
          <a class="btn btn-xs btn-primary" href="{{route('article.edit',['id'=>$article_data->id])}}" target="_blank">
              <span style="padding-left: 5px;">編輯文章</span>
          </a>
          <input type="hidden" name="show" value="1">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-xs btn-danger">
            <span style="padding-left: 5px;">刪除文章</span>
          </button>
          @endif
        </form>
      </div>
  </div>
@stop

{{-- message bar  --}}
@section('message')
  <div class="col-md-8">
  @foreach ($message as $key => $value)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-8">
          <span class="badge">
            {{$value->user->name}}
          </span>
          &nbsp在{{$value->created_at}}&nbsp留言
        </div>
        <div class="col-md-4">
          <form action="/" method="post">
        @if (Auth::check() and Auth::user()->isUser($value->user_id))
          <button type="submit" class="btn btn-danger btn-xs pull-right">刪除留言</button>
        @endif
          </form>
        </div>
        <div class="col-md-12 message">
          {{$value->content}}
        </div>
      </div>
    </div>
  @endforeach
  <div class="pull-right">
      {!! $message->render() !!}
  </div>
  </div>
@stop

{{-- board bar  --}}
@section('board')
  @if (Auth::check())
    <form action="{{route('message.commit.store',['article_id'=>$article_data->id])}}" method="post">
      {{ csrf_field() }}
      <div class="col-md-6 col-md-offset-1">
        <div>
          <label>留言者：{{Auth::user()->name}}</label>
        </div>
        <div class="message">
          <textarea name="content" rows="8" cols="76"></textarea>
        </div>
        <div class="pull-right message">
          <button type="submit" class="btn btn-primary btn-lg">
          	留言
          </button>
        </div>
      </div>
    </form>
  @else
    <div class="col-md-8 text-center">
      <p>請先
        <a data-toggle="modal" data-target="#myModal">登入</a>
        後才可留言
      </p>
    </div>
  @endif
@include('logTarget')
@stop
