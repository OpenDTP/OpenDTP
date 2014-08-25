@extends('layouts.default')
@section('title')
{{{ $company->name }}} ::
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
        <div class="col-md-5"><h1>{{{ $company->name }}}</h1></div>
        <div class="col-md-7"><h2>{{{ $company->description }}}</h2></div>
    </div>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Created</th>
        <th>Valide</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{{$company->name}}}</td>
        <td>{{{$company->description}}}</td>
        <td>{{{$company->created_at}}}</td>
        <td>{{{$company->valid}}}</td>
    </tr>
    </tbody>
</table>
@stop
