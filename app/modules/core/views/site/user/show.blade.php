@extends('layouts.default')
@section('title')
{{{ Lang::get('user/profile.title') }}} ::
@parent
@stop
@section('css')
@parent
{{HTML::style('css/core/core.min.css')}}

@stop
@show
{{-- Content --}}
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-5"><h1>{{{ $user->login }}}</h1></div>
        <div class="col-md-7"><h2>{{{ Lang::get('user/profile.description') }}}</h2></div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <img src="{{{ URL::to('user/picture') }}}" class="thumbnail thumbnail-user" alt="user thumbnail">
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-9">
                <h3>{{{ $user->firstname }}} {{{ $user->lastname }}}</h3>
                <hr/>
                <p><strong>{{{ Lang::get('global.description') }}} :</strong> {{{ $user->description }}}</p>
                <p><strong>{{{ Lang::get('user/profile.since') }}} :</strong> {{{ $user->created_at }}}</p>
                <p><strong>{{{ Lang::get('user/profile.last') }}} :</strong> {{{ $user->updated_at }}}</p>
            </div>
            <div class="col-md-3">
                <a class="thumbnail" href="#">
                    <img src="/images/shared/placeholders/Logo-Evaneos.jpg" alt="evaneos"/>
                </a>
            </div>
        </div>
    </div>
</div>
@stop
