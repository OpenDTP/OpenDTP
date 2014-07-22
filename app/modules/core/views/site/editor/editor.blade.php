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
	<div id="top"></div>
	<div style="overflow: auto; padding: 20px; margin: 20px;">
		<div contenteditable="true" id="inline1" style="width: 49%; float: left;">
			<h3>Inline1</h3>
			<p>
				<strong>Aenean nonummy a, mattis varius. Cras aliquet.</strong>
				Praesent <a href="http://ckeditor.com/">magna non mattis ac, rhoncus nunc</a>, rhoncus eget, cursus pulvinar mollis.</p>
			<p>Proin id nibh. Sed eu libero posuere sed, lectus. Phasellus dui gravida gravida feugiat mattis ac, felis.</p>
			<p>Integer condimentum sit amet, tempor elit odio, a dolor non ante at sapien. Sed ac lectus. Nulla ligula quis eleifend mi, id leo velit pede cursus arcu id nulla ac lectus. Phasellus vestibulum. Nunc viverra enim quis diam.</p>
		</div>
		<div contenteditable="true" id="inline2" style="width: 49%; float: right;">
			<h3>Inline2</h3>
			<p>Donec ullamcorper, risus tortor, pretium porttitor. Morbi quam quis lectus non leo.</p>
			<p style="margin-left: 40px; ">Integer faucibus scelerisque. Proin faucibus at, aliquet vulputate, odio at eros. Fusce <a href="http://ckeditor.com/">gravida, erat vitae augue</a>. Fusce urna fringilla gravida.</p>
			<p>In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.</p>
		</div>
	</div>
	<div id="bottom"></div>
  @stop
  @section('script')
  @parent
  <script>
  CKEDITOR.disableAutoInline = true;
  
  CKEDITOR.inline( 'inline1', {
    extraPlugins: 'sharedspace',
    removePlugins: 'floatingspace,resize',
    sharedSpaces: {
      top: 'top',
      bottom: 'bottom'
    }
  });

  CKEDITOR.inline( 'inline2', {
    extraPlugins: 'sharedspace',
    removePlugins: 'floatingspace,resize',
    sharedSpaces: {
      top: 'top',
      bottom: 'bottom'
    }
  });

  CKEDITOR.appendTo( 'framed1', {
    extraPlugins: 'sharedspace',
    removePlugins: 'maximize,resize',
    sharedSpaces: {
      top: 'top',
      bottom: 'bottom'
    }
  },
  document.getElementById( 'inline1' ).innerHTML
);

CKEDITOR.appendTo( 'framed2', {
  extraPlugins: 'sharedspace',
  removePlugins: 'maximize,resize',
  sharedSpaces: {
    top: 'top',
    bottom: 'bottom'
  }
},
document.getElementById( 'inline2' ).innerHTML
);
</script>
@stop
