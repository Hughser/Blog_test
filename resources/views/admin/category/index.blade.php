@extends('admin.layout')
@section('admin.sidecontent')
<h1 class="page-header">分類</h1>
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
            @foreach ($category_date as $category)
            <tr id="{{$category->id}}" type="categorie">
                <td class="col-md-4">{{$category->name}}</td>
                <td class="col-md-3">{{$category->created_at}}</td>
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
    {!! $category_date->render() !!}
</div>
@stop
