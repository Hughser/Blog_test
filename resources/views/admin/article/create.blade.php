@extends('admin.layout')
@section('admin.sidecontent')
<h1 class="page-header">新增文章</h1>
<div class="row">
    <div class="col-md-11">
        <form id="add_article" action=
        "{{
          isset($btn_name)?route('article.store'):route('article.update',['id'=>$article_data->id])
        }}"
        method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>標題:</label>
                <input type="text" name="title" class="form-control" value="{{$article_data->title}}">
            </div>

            <div class="form-group">
                <label>分類:</label>
                <select class="category_select form-control" name="category_select">
                @foreach ($category_date as $category)
                  <option value="{{$category->id}}"
                    @if ($article_data->category_id==$category->id)
                      selected
                    @endif
                    >
                    {{$category->name}}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
                <label>標籤:</label>
                <select class="tag_select form-control" name="tag_list[]" multiple="multiple">
                @foreach ($tag_date as $tag)
                  <option value="{{$tag->id}}"
                    @foreach ($article_data->tag as $value)
                      @if ($value->id==$tag->id)
                        selected
                      @endif
                    @endforeach
                    >
                    {{$tag->name}}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
                <label for="content">内容</label>
                <div id="editormd">
                    <textarea style="display:none;" name="markdown-body">{{$article_data->body}}</textarea>
                    <textarea style="display:none;" name="html-body"></textarea>
                </div>
            </div>
            <button id="btn_add_article" type="submit" class="btn btn-primary btn-lg btn-block">
              {{$btn_name or '新增' }}
            </button>
        </form>
    </div>
</div>
@stop
@section('editor_js')
<script>
    var editor = editormd("editormd", {
        path: "{{ asset('/editor.md/lib/') }}/",
        height: 500,
        syncScrolling: "single",
        toolbarAutoFixed: false,
        saveHTMLToTextarea: false
    });

    $(document).on('click', '#btn_add_article', function() {
        var html = editor.getPreviewedHTML();
        $("#add_article textarea[name='html-body']").val(html);
    });
</script>
@stop
