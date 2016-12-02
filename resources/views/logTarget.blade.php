<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center">留言登入</h4>
			</div>
			<div class="modal-body">
				<form action="{{route('visitor.anonymous')}}" method="post">
					{{ csrf_field() }}
					<label>暱名</label>
          <input type="text" name="anonymous_name" class="form-control">
          <button type="submit" class="btn btn-lg btn-default btn-block message">確定</button>
		    </form>
        <hr/>
        <p class="text-center">其他登入方式</p>
        <a class="btn btn-lg btn-primary btn-block message" href='{{route('visitor.redirect',['visitor'=>'facebook'])}}'>Facebook</a>
        <a class="btn btn-lg btn-danger btn-block message" href='{{route('visitor.redirect',['visitor'=>'google'])}}'>Google</a>
        <a class="btn btn-lg btn-info btn-block message" href='{{route('visitor.redirect',['visitor'=>'github'])}}'>GitHub</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
