<div class="col-md-2">
  <div class="side-menu">
      <nav class="navbar navbar-default" role="navigation">
          <div class="side-menu-container">
              <ul class="nav navbar-nav">
                  <li>
                    <a href="{{route('backstage')}}">
                      <span class="glyphicon glyphicon-signal"></span>儀表板
                    </a>
                  </li>
                  <li class="panel panel-default" id="dropdown">
                      <a data-toggle="collapse" href="#dashboard">
                          <span class="glyphicon glyphicon-list-alt"></span>文章
                          <span class="caret"></span>
                      </a>
                      <div id="dashboard" class="panel-collapse collapse">
                          <div class="panel-body">
                              <ul class="nav navbar-nav">
                                  <li><a href="{{route('article.index')}}">查看文章</a></li>
                                  <li><a href="{{route('article.create')}}">新增文章</a></li>
                                  <li><a href="{{route('article.garbage')}}">垃圾桶</a></li>
                              </ul>
                          </div>
                      </div>
                  </li>
                  <li class="panel panel-default" id="dropdown">
                      <a data-toggle="collapse" href="#categorie">
                          <span class="glyphicon glyphicon-book"></span>分類
                          <span class="caret"></span>
                      </a>
                      <div id="categorie" class="panel-collapse collapse">
                          <div class="panel-body">
                              <ul class="nav navbar-nav">
                                  <li><a href="{{route('categorie.index')}}">查看分類</a></li>
                                  <li><a href="{{route('categorie.create')}}">新增分類</a></li>
                              </ul>
                          </div>
                      </div>
                  </li>
                  <li class="panel panel-default" id="dropdown">
                      <a data-toggle="collapse" href="#tag">
                          <span class="glyphicon glyphicon-tag"></span>標籤
                          <span class="caret"></span>
                      </a>
                      <div id="tag" class="panel-collapse collapse">
                          <div class="panel-body">
                              <ul class="nav navbar-nav">
                                  <li><a href="{{route('tag.index')}}">查看標籤</a></li>
                                  <li><a href="{{route('tag.create')}}">新增標籤</a></li>
                              </ul>
                          </div>
                      </div>
                  <li class="panel panel-default" id="dropdown">
                    <a href="#">
                      <span class="glyphicon glyphicon-cog"></span>設定
                    </a>
                  </li>
              </ul>
          </div>
      </nav>
  </div>
</div>
