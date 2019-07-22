@if(Session::has('error'))
<p class="alert alert-danger">Tài khoản hoặc mật khẩu sai</p>
@endif
@foreach ($errors->all() as $messages)
<p class="alert alert-danger">{{$messages}}</p>
@endforeach