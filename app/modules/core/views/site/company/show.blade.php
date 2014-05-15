@extends('site.layouts.default')
@section('title')
{{{ Lang::get('user/user.user_title') }}} ::
@parent
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
  <h1>Company Profile</h1>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Created</th>
        <th>Valide</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{{$response->id}}}</td>
        <td>{{{$response->name}}}</td>
        <td>{{{$response->description}}}</td>
        <td>{{{$response->created_at}}}</td>
        <td>{{{$response->valid}}}</td>
    </tr>
    </tbody>
</table>
@stop
