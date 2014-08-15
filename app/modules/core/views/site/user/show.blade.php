@extends('layouts.default')
@section('title')
{{{ Lang::get('user/user.user_title') }}} ::
@parent
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-5"><h1>{{{ $user->login }}}</h1></div>
        <div class="col-md-7"><h2>{{{ Lang::get('user/show.description') }}}</h2></div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <img src="/images/shared/placeholders/lindt.png" class="thumbnail" alt="lindt">
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-9">
                <h3>{{{ $user->firstname }}} {{{ $user->lastname }}}</h3>
                <hr/>
                <p><strong>Description :</strong> {{{ $user->description }}}</p>
                <p><strong>Member from :</strong> {{{ $user->created_at }}}</p>
                <p><strong>last connection :</strong> {{{ $user->updated_at }}}</p>
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
