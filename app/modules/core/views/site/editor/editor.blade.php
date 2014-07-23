@extends('site.layouts.default')
@section('title')
{{{ Lang::get('editor/editor.editor_title') }}} ::
@parent
@stop
@section('css')
@parent
@stop
{{-- Content --}}
@section('content')
<div class="col-md-12">
	<textarea name="article-body" style="height: 200px">
    <h1>Inline Editing in Action!</h1>
    <p>The "div" element that contains this text is now editable.
  </textarea>
</div>
@stop
@section('script')
@parent
<script>
  CKEDITOR.inline( 'article-body' );
</script>
@stop
