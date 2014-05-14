@extends('site.layouts.default')
@section('title')
{{{ Lang::get('editor/editor.editor_title') }}} ::
@parent
@stop
@section('css')
    {{HTML::style('imageflow/imageflow.css')}}
@parent
@stop
{{-- Content --}}
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Publications en cours</h3>
    </div>
    <div class="panel-body">
      <div id="imageflow-opendtp" class="imageflow">
        {{HTML::image('/imageflow/img/img1.png', "Img1")}}
        {{HTML::image('/imageflow/img/img1.png', "Img1bis")}}
        {{HTML::image('/imageflow/img/img1.png', "Img1ter")}}
        {{HTML::image('/imageflow/img/img1.png', "Img1quar")}}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Articles en cours</h3>
      </div>
      <div class="panel-body" id="scrolling-panels">
        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
        <a href="#" class="list-group-item">Morbi leo risus</a>
        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
        <a href="#" class="list-group-item">Vestibulum at eros</a>
        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
        <a href="#" class="list-group-item">Morbi leo risus</a>
        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
        <a href="#" class="list-group-item">Vestibulum at eros</a>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Notifications système</h3>
      </div>
      <div class="panel-body" id="scrolling-panels">
        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
        <a href="#" class="list-group-item">Morbi leo risus</a>
        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
        <a href="#" class="list-group-item">Vestibulum at eros</a>
        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
        <a href="#" class="list-group-item">Morbi leo risus</a>
        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
        <a href="#" class="list-group-item">Vestibulum at eros</a>
      </div>
    </div>
  </div>
@stop
@section('script')
@parent
		{{HTML::script('imageflow/imageflow.js')}}
@stop
