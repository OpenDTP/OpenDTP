@extends('layouts.default')
@section('title')
{{{ Lang::get('project/create.title') }}} ::
@parent
@stop
@section('css')
@parent
{{HTML::style('css/project/project.min.css')}}
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-5"><h1>{{{ Lang::get('project/create.title') }}}</h1></div>
        <div class="col-md-7"><h2>{{{ Lang::get('project/create.description') }}}</h2></div>
    </div>
</div>
<div class="project-create">
</div>
@stop
@section('script')
@parent
{{HTML::script('js/project/project.min.js')}}
@stop
