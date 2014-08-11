@extends('layouts.default')
@section('title')
{{{ Lang::get('company/company.company_edit') }}} ::
@parent
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
  <h1>Company Edit</h1>
</div>
<div class="col-md-3">
  {{ Form::open(array('url' => "/user/$response->id/edit", 'method' => 'put')) }}
    {{ Form::label('name', 'Company name') }}
    {{ Form::text('name', $response->name) }}
    {{ Form::label('description', 'Company Description') }}
    {{ Form::textarea('description', $response->description) }}
    {{ Form::submit('Send') }}
  {{ Form::close() }}
</div>
@stop
