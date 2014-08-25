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
    {{ Form::open(['url' => '/project', 'role' => 'form', 'class' => 'form validate']) }}
    <div class="row">
        <div class="col-md-4">
            <p><span class="glyphicon glyphicon-chevron-righ"></span> Define to who this project belong to</p>
            <div class="form-group">
            {{ Form::select('company_id',
                $companies_name,
                null,
                [ 'class' => 'form-control', 'id' => 'company', 'placeholder' => 'company' ]
            ) }}
            </div>
        </div>
        <div class="col-md-4">
            <p><span class="glyphicon glyphicon-chevron-righ"></span> How should we call it ?</p>
            <div class="form-group">
                {{ Form::text('name', null, [
                    'class' => 'form-control',
                    'id' => 'name',
                    'placeholder' => 'name',
                    'minlength' => 4,
                    'required' => 'required'
                ]) }}
            </div>
            <br/>
            <div class="form-group">
                {{ Form::textarea('description', null, [
                    'class' => 'form-control',
                    'id' => 'description',
                    'placeholder' => 'project description'
                ]) }}
            </div>
        </div>
        <div class="col-md-4">
            <p><span class="glyphicon glyphicon-chevron-righ"></span> When shoud it be delivered ?</p>
            <div class="calendar"></div>
        </div>
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
{{HTML::script('js/project/project.min.js')}}

<script>

    window.onload = function () {
        $(".calendar").fullCalendar({});
    }


</script>
@stop
