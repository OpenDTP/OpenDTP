@extends('site.layouts.default')
@section('title')
{{{ Lang::get('user/user.user_edit') }}} ::
@parent
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
  <h1>user Edit</h1>
</div>
<div class="col-md-3">
  {{ Form::open(array('url' => "/user/$user->id/edit", 'method' => 'put')) }}
    {{ Form::label('login', 'Username') }}
    {{ Form::text('login', $user->login) }}
    {{ Form::label('email', 'User Email') }}
    {{ Form::text('email', $user->email) }}
    {{ Form::submit('Send') }}
  {{ Form::close() }}
</div>
@stop
