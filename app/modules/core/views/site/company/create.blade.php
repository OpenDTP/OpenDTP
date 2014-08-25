@extends('layouts.default')
@section('title')
{{{ Lang::get('company/create.title') }}} ::
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
        <div class="col-md-5"><h1>{{{ Lang::get('company/create.title') }}}</h1></div>
        <div class="col-md-7"><h2>{{{ Lang::get('company/create.description') }}}</h2></div>
    </div>
</div>
<div class="company-create">
    {{ Form::open(['url' => '/company', 'role' => 'form', 'class' => 'form validate']) }}
    <div class="row">
        <div class="col-md-3 company-logo">
            <div class="upload">
                <span class="glyphicon glyphicon-upload"></span>
            </div>
            <img class="thumbnail" />
        </div>
        <div class="col-md-9">
            {{ Form::text('name', null, [
                'class' => 'form-control',
                'id' => 'name',
                'placeholder' => 'name',
                'minlength' => 4,
                'required' => 'required'
            ]) }}
            <br/>
            {{ Form::textarea('description', null, [
                'class' => 'form-control',
                'id' => 'description',
                'placeholder' => 'Company description'
            ]) }}
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
<script>
    $('.upload').dropzone(
        {
            url: '/company',
            autoProcessQueue: false,
            maxFiles: 1,
            previewsContainer: false,
            thumbnail: function (file, dataUrl) {
                $('.company-logo > .thumbnail').attr('alt', file.name);
                $('.company-logo > .thumbnail').attr('src', dataUrl);
                $('.company-logo > .thumbnail').show();
                $('.company-logo > .upload').hide();
            }
        }
    );
</script>
@stop
