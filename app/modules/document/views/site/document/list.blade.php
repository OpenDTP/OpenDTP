@extends('layouts.default')
@section('title')
{{{ Lang::get('project/list.title') }}} ::
@parent
@stop
@section('css')
@parent
{{HTML::style('css/document/document.min.css')}}
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-5"><h1>{{{ Lang::get('document/list.title') }}}</h1></div>
        <div class="col-md-7"><h2>{{{ Lang::get('document/list.description') }}}</h2></div>
    </div>
</div>
<div class="row">
    <div class="col-md4">
        <div class="document-list">
            <ul>
              <li>Root node 1
                <ul>
                  <li id="child_node_1">Child node 1</li>
                  <li>Child node 2</li>
                </ul>
              </li>
              <li>Root node 2</li>
            </ul>
          </div>
    </div>
    <div class="col-md-8"></div>
</div>
@stop
@section('script')
@parent
{{HTML::script('js/document/document.min.js')}}
<script>
$(function () {
    $('.document-list').jstree();
});
</script>
@stop