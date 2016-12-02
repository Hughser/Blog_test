@extends('admin.layout')
@section('admin.sidecontent')
<h1 class="page-header">垃圾桶</h1>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>標題</th>
                    <th>分類</th>
                    <th>標籤</th>
                    <th>點擊數</th>
                    <th>建立時間</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($article_data as $article)
                <tr id="{{$article->id}}" type="article">
                    <td>
                        <a href="{{route('article.show',['id'=>$article->id])}}" target="_blank">
                            {{str_limit($article->title, $limit = 70, $end = '...')}}
                          </a>
                    </td>
                    <td>{{$article->category->name}}</td>
                    <td>
                        @foreach($article->tag as $tag) {{$tag->name}}&nbsp @endforeach
                    </td>
                    <td>{{$article->click}}</td>
                    <td>{{$article->created_at}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('article.recovery',['id'=>$article->id])}}">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            <font>復原</font>
                        </a>
                        <a class="btn btn-danger btn_tag-delete" href="{{route('article.forcedelete',['id'=>$article->id])}}">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            <font>刪除</font>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="wrap">
        {!! $article_data->render() !!}
    </div>
</div>
@stop
