@extends('layouts.default')
@section('title')
{{{ Lang::get('project/list.title') }}} ::
@parent
@stop
@section('css')
@parent
{{HTML::style('css/project/core.min.css')}}
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-5"><h1>{{{ Lang::get('company/create.title') }}}</h1></div>
        <div class="col-md-7"><h2>{{{ Lang::get('company/create.description') }}}</h2></div>
    </div>
</div>
<div class="project-create">
    {{ Form::open(['url' => '/company', 'role' => 'form', 'class' => 'form validate']) }}
    <div class="row">
    </div>
    <hr/>
    <div class="row">
        <div class="btn-group right">
            {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
@stop
@section('script')
@parent
{{HTML::script('js/project/core.min.js')}}
@stop
