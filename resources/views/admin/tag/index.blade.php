@extends('admin.layout')
@section('admin.sidecontent')
<h1 class="page-header">標籤</h1>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>名稱</th>
                    <th>建立時間</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tag_date as $tag)
                <tr id="{{$tag->id}}" type="tag">
                    <td class="col-md-4">{{$tag->name}}</td>
                    <td class="col-md-3">{{$tag->created_at}}</td>
                    <td class="col-md-3">
                        <a class="btn btn-primary btn_tag-edit">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            <font>編輯</font>
                        </a>
                        <a class="btn btn-danger btn_tag-delete">
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
        {!! $tag_date->render() !!}
    </div>
</div>
@stop
