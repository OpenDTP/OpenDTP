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
        <div class="thumbnail">
            <img src="/images/shared/placeholders/lindt.png" alt="lindt">

            <div class="caption">
                <h3>lead</h3>

                <p>short description of this member</p>

                <div class="btn-group">
                    <button type="button" class="btn btn-default" data-toggle="tooltip" title="unreachable">
                        <span class="glyphicon glyphicon-minus-sign"></span>
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" title="remove">
                        <span class="glyphicon glyphicon-remove-sign"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-9">
                <h3>Michael FORASTE</h3>
                <hr/>
                <p><strong>company :</strong> Evaneos</p>

                <p><strong>role in this project :</strong> Lead</p>

                <p><strong>role in this company :</strong> Lead</p>

                <p><strong>last connection :</strong> 03/08/2014 - 10:14</p>
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
