@extends('layouts.default')
@section('title')
{{{ Lang::get('user/project.project_title') }}} ::
@parent
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>Your projects</h1>
    <table class="table table-striped">
        <thead>
            <th>{{{ Lang::get('user/global.preview') }}}</th>
            <th>{{{ Lang::get('user/global.name') }}}</th>
            <th>{{{ Lang::get('user/global.description') }}}</th>
            <th>{{{ Lang::get('user/global.actions') }}}</th>
        </thead>
        <tbody>
            <tr>
                <td>preview</td>
                <td>plop</td>
                <td>description du plop</td>
                <td>les tools</td>
            </tr>
            <tr>
                <td>preview</td>
                <td>plop</td>
                <td>description du plop</td>
                <td>les tools</td>
            </tr>
            <tr>
                <td>preview</td>
                <td>plop</td>
                <td>description du plop</td>
                <td>les tools</td>
            </tr>
        </tbody>
    </table>
</div>
@stop
