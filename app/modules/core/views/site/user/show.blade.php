@extends('site.layouts.default')
@section('title')
{{{ Lang::get('user/user.user_title') }}} ::
@parent
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>User Profile</h1>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>Email</th>
				<th>Created</th>
				<th>Valide</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{{$user->id}}}</td>
        <td>{{{$user->login}}}</td>
        <td>{{{$user->email}}}</td>
				<td>{{{$user->created_at}}}</td>
				<td>{{{$user->valid}}}</td>
    </tr>
    </tbody>
</table>
@stop
