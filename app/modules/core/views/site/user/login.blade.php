@extends('site.layouts.default')
@section('title')
{{{ Lang::get('user/user.user_login') }}} ::
@parent
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
  <h1>Login</h1>
</div>
<div class="col-md-3">
  {{ Form::open(array('url' => "/user/login")) }}
    {{ Form::label('login', 'Username') }}
    {{ Form::text('login', null, array('class' => 'form-control')) }}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-control')) }}
    {{ Form::submit('Send', array('class' => 'btn btn-primary')) }}
  {{ Form::close() }}
</div>
@stop
