@extends('admin.layout')
@section('admin.sidecontent')
<h1 class="page-header">新增分類</h1>
<div class="row">
  <div class="col-md-12">
    <form class="" action="{{route('categorie.store')}}" method="post">
      {{ csrf_field() }}
      <label>名稱:</label>
      <input type="text" name="category_name" value="">
      <button type="submit" class="btn btn-primary">新增</button>
    </form>
  </div>
</div>
@stop
