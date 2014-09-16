@extends('layouts.default')
@section('title')
{{{ Lang::get('project/list.title') }}} ::
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
        <div class="col-md-5"><h1>{{{ Lang::get('project/list.title') }}}</h1></div>
        <div class="col-md-7"><h2>{{{ Lang::get('project/list.description') }}}</h2></div>
    </div>
</div>
<table class="table table-striped table-list">
    <thead>
    <th>{{{ Lang::get('global.name') }}}</th>
    <th>{{{ Lang::get('global.description') }}}</th>
    <th>{{{ Lang::get('global.end') }}}</th>
    <th>{{{ Lang::get('global.status') }}}</th>
    <th>{{{ Lang::get('global.actions') }}}</th>
    </thead>
    <tbody>
    @foreach ($projects as $project)
        <tr>
            <td>{{{ $project->name }}}</td>
            <td>{{{ $project->description }}}</td>
            <td></td>
            <td class="status status-ok"><span class="glyphicon glyphicon-ok-circle"></span></td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default">
                        <a href="{{{ URL::to('project/' . $project->id) }}}">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                    </button>
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    <button type="button" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop
