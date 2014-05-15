@extends('site.layouts.default')
@section('title')
{{{ Lang::get('user/user.user_title') }}} ::
@parent
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
  <h1>Home</h1>
</div>

@stop
