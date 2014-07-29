@extends('layouts.blank')
@section('title')
{{{ Lang::get('user/user.user_login') }}} ::
@parent
@stop
@section('css')
@parent
{{HTML::style('css/core/core.min.css')}}
@stop
{{-- Content --}}
@section('content')
<div class="row login-header">
    <div class="col-md-4  col-md-offset-4 logo-full"></div>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div>
            <p>
                Welcome to the collaborative publication plateform
                <br />
                Give a boost to your publications projects
            </p>
        </div>
        {{ Form::open(['url' => '/user/login', 'role' => 'form', 'class' => 'pannel']) }}
            <div class="form-group pannel">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                    {{ Form::text('login', null, [
                        'class' => 'form-control', 'class' => 'form-control', 'id' => 'login', 'placeholder' => 'login'
                    ]) }}
                </div>
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
                    {{ Form::text('password', null, [
                        'class' => 'form-control', 'class' => 'form-control', 'id' => 'password', 'placeholder' => 'password'
                    ]) }}
                </div>
                <div class="btn-group right">
                    {{ Form::submit('Send', array('class' => 'btn btn-default')) }}
                </div>
            </div>
        {{ Form::close() }}
        <div style="text-align: center;"><a href="">Register</a> - <a href="">Forgot your password ?</a></div>
    </div>
</div>
@stop
