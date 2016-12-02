<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid nav-gr">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">切換導航</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        {{-- index --}}
        <a class="navbar-brand" href="{{url('/')}}">Blog</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown bt">
        <a class="dropdown-toggle" data-toggle="dropdown" href="/">
    			<i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
    		</a>
        <ul class="dropdown-menu dropdown-messages">
          <li>
    				<a href="#">
    					<div>
    						<i class="fa fa-comment fa-fw"></i>
                <strong>待完成</strong>
                <font class="pull-right">3天前</font>
                <div class="message">待完成...</div>
    					</div>
    				</a>
    			</li>
          <li class="divider"></li>
          <li>
            <a class="text-center" href="#">
              <strong>See All Alerts</strong>
              <i class="fa fa-angle-right"></i>
            </a>
          </li>
        </ul>
      </li>
      <li class="dropdown bt">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="/admin/settings/index">
              <i class="fa fa-gear fa-fw"></i> Settings
            </a>
    			</li>
          <li class="divider"></li>
          <li>
            <a href="/logout">
              <i class="fa fa-sign-out fa-fw"></i> Logout
            </a>
        </ul>
      </li>
    </ul>
  </div>
<nav>
