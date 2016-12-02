@extends('admin.layout')
@section('admin.sidecontent')
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-tasks fa-4x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div>{{$article_count}}</div>
                    <div>文章</div>
                </div>
            </div>
        </div>
        <a href="{{route('article.index')}}">
            <div class="panel-footer">
                <span class="pull-left">查看</span>
                <span class="pull-right">
                          <i class="fa fa-arrow-circle-right"></i>
                        </span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-book fa-4x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div>{{$category_count}}</div>
                    <div>分類</div>
                </div>
            </div>
        </div>
        <a href="{{route('categorie.index')}}">
            <div class="panel-footer">
                <span class="pull-left">查看</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-yellow">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-tag fa-4x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div>{{$tag_count}}</div>
                    <div>標籤</div>
                </div>
            </div>
        </div>
        <a href="{{route('tag.index')}}">
            <div class="panel-footer">
                <span class="pull-left">查看</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
@stop
