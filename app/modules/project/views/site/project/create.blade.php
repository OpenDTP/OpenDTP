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
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    {{ Form::select('company',
                        ['company', 'test', 'test2'],
                        null,
                        [ 'class' => 'form-control', 'id' => 'company', 'placeholder' => 'company' ]
                    ) }}
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        {{ Form::text('name', null, [
                            'class' => 'form-control', 'id' => 'name', 'placeholder' => 'name'
                        ]) }}
                    </div>
                    <div class="input-group">
                        {{ Form::textarea('description', null, [
                            'class' => 'form-control', 'id' => 'description', 'placeholder' => 'project description'
                        ]) }}
                    </div>
                    <div class="btn-group right">
                        {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    {{ Form::close() }}
</div>
</div>
@stop
@section('script')
@parent
{{HTML::script('js/project/project.min.js')}}
@stop
