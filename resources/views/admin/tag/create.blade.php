@extends('admin.layout')
@section('admin.sidecontent')
<h1 class="page-header">新增標籤</h1>
<div class="row">
  <div class="col-md-12">
    <form class="" action="{{route('tag.store')}}" method="post">
      {{ csrf_field() }}
      <label>名稱:</label>
      <input type="text" name="tag_name">
      <button type="submit" class="btn btn-primary">新增</button>
    </form>
  </div>
</div>
@stop
