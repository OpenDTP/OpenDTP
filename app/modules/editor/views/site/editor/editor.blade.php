@extends('layouts.default')
@section('title')
{{{ Lang::get('editor/editor.editor_title') }}} ::
@parent
@stop
@section('css')
@parent
{{ HTML::style('css/core/core.min.css');}}
<style>
.dock .ckbar { padding-top:53px; z-index:2; position:fixed; }
</style>
@stop
{{-- Content --}}
@section('content')
<div style="overflow: auto; padding: 10px; margin: 10px;  border-style:groove;">
	<div  id="inline1_outer" >
		<div contenteditable="true" id="inline1" >
			<h3>Inline1</h3>
			<p>Donec ullamcorper, risus tortor, pretium porttitor. Morbi quam quis lectus non leo.</p>
			<p style="margin-left: 40px;">Integer faucibus scelerisque. Proin faucibus at, aliquet vulputate, odio at eros. Fusce <a href="http://tinymce.com/">gravida, erat vitae augue</a>. Fusce urna fringilla gravida.</p>
			<p>In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.</p>
			<p>In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.</p>
			<p>In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.</p>
			<p>In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.</p>
			<p>In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.</p>
			<p>In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.</p>
		</div>
	</div>
</div>
@stop
@section('script')
@parent
{{HTML::script('js/core/core.min.js')}}
{{HTML::script('tinymce/tinymce.js')}}
<script>
	Dropzone.options.myAwesomeDropzone = {
	  paramName: "file", // The name that will be used to transfer the file
	  maxFilesize: 2, // MB
	  accept: function(file, done) {
			done();
	  }
	};
</script>
<script>
    tinymce.init({
        selector: "#inline1",
        theme: "modern",
        add_unload_trigger: false,
        plugins: "image",
        menu: {},
        schema: "html5",
        inline: false,
        toolbar: "undo redo | styleselect | bullist numlist | alignleft aligncenter alignright alignjustify | preview | image | mybutton",
        statusbar: false,
        setup: function(editor) {
	        editor.addButton('mybutton', {
	            text: 'Save',
	            icon: 'save',
        });
    }
    });
</script>
@stop
