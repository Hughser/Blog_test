{{-- right bar --}}
<div class="col-md-3 pull-right">
    {{-- categorie bar --}}
    <div class="well">
        <h1>分類<h1>
      <small>
        <ul>
        @foreach ($category_bar as $key => $value)
          <li>
            <a href="{{route('categorie.show',['name'=>$value->name])}}">
                {{$value->name}}</br>
              </a>
            </li>
          @endforeach
          </ul>
        </small>
  </div>

  {{-- tag bar --}}
  <div class="well">
    <h1>標籤<h1>
    <small>
      <ul>
      @foreach ($tag_bar as $key => $value)
        <li>
          <a href="{{route('tag.show',['name'=>$value->name])}}">
            {{$value->name}}</br>
          </a>
        </li>
      @endforeach
      </ul>
    </small>
  </div>

  {{-- hot article bar --}}
  <div class="well">
    <h1>熱門文章<h1>
      <small>
        <ul>
        @foreach ($article_hot as $key => $value)
          <li>
            <a href="{{route('article.show',['id'=>$value->id])}}">
              {{$value->title}}</br>
            </a>
          </li>
        @endforeach
        </ul>
      </small>
  </div>
</div>
