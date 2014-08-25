@extends('layouts.default')
@section('title')
{{{ Lang::get('company/list.title') }}} ::
@parent
@stop
@section('css')
@parent
{{HTML::style('css/core/core.min.css')}}
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-5"><h1>{{{ Lang::get('company/list.title') }}}</h1></div>
        <div class="col-md-7"><h2>{{{ Lang::get('company/list.description') }}}</h2></div>
    </div>
</div>
<div class="company-list">
    <h1>Your company</h1>
    @if (isset($company))
    <div class="row">
        <div class="col-md-3">image</div>
        <div class="col-md-6">{{ $company->description }}</div>
        <div class="col-md-3">actions</div>
    </div>
    @else
    <h3>You're not member of a company</h3>
    <h1>Your partners</h1>
    @endif
    @if (isset($partners) && is_array($partners))
    <table class="table table-striped table-list">
        <thead>
            <th></th>
            <th>{{{ Lang::get('global.name') }}}</th>
            <th>{{{ Lang::get('global.description') }}}</th>
            <th>{{{ Lang::get('global.actions') }}}</th>
        </thead>
        <tbody>
        @foreach ($partners as $partner)
        <tr>
            <td>
                <a class="thumbnail" href="#">
                    <img src="/images/shared/placeholders/Logo-Evaneos.jpg" alt="evaneos"/>
                </a>
            </td>
            <td>{{ $partner->name }}</td>
            <td>{{ $partner->description }}</td>
            <td>
                <button type="button" class="btn btn-default">
                    <a href="{{{ URL::to('company/' . $partner->id) }}}">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                </button>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil"></span>
                </button>
                <button type="button" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <h3>You do not have partners companies</h3>
    @endif
</div>
@stop
