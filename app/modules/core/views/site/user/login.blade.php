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
    {{ Form::text('login') }}
    {{ Form::label('password', 'Password') }}
    {{ Form::text('password') }}
    {{ Form::submit('Send') }}
  {{ Form::close() }}
</div>
@stop
