@extends('site.layouts.default')
@section('title')
{{{ Lang::get('editor/editor.editor_title') }}} ::
@parent
@stop
@section('css')
@parent
  <style>
  .dock .ckbar { padding-top:53px; z-index:2; position:fixed; }
  </style>
@stop
{{-- Content --}}
@section('content')
<div class="wrap">
  <div id="top" class="ckbar" style="width:596px;"></div>
</div>
<div style="overflow: auto; padding: 20px; margin: 20px;">
  <div contenteditable="true" id="inline1" style="width: 49%; float: left;">
    <h3>Inline1</h3>
    <p>Donec ullamcorper, risus tortor, pretium porttitor. Morbi quam quis lectus non leo.</p>
    <p style="margin-left: 40px;">Integer faucibus scelerisque. Proin faucibus at, aliquet vulputate, odio at eros. Fusce <a href="http://ckeditor.com/">gravida, erat vitae augue</a>. Fusce urna fringilla gravida.</p>
    <p>In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.</p>
  </div>
  <div contenteditable="true" id="inline2" style="width: 49%; float: right;">
    <h3>Inline2</h3>
    <p>Donec ullamcorper, risus tortor, pretium porttitor. Morbi quam quis lectus non leo.</p>
    <p style="margin-left: 40px;">Integer faucibus scelerisque. Proin faucibus at, aliquet vulputate, odio at eros. Fusce <a href="http://ckeditor.com/">gravida, erat vitae augue</a>. Fusce urna fringilla gravida.</p>
    <p>In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.</p>
  </div>
</div>
<div id="bottom"></div>
@stop
@section('script')
@parent
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
    <script>
    var elWrap = $(".wrap");
    var elMenu = $(".ckbar");
    var osMenu = elMenu.offset().top;
    jQuery(document).ready(function(){
      $(window).scroll($.throttle(10, function() {
        elMenu.css("top", 0);
        var edge = $(window).scrollTop();

        if (osMenu <= edge + 53) {
          elWrap.addClass("dock").removeClass("stop");
        }
        else {
          elWrap.removeClass("dock stop");
        }
      }))});
  </script>
<script>
  CKEDITOR.disableAutoInline = true;
  CKEDITOR.inline( 'inline1', {
    sharedSpaces: {
      top: 'top',
      bottom: 'bottom'
    }
  });

  CKEDITOR.inline( 'inline2', {
    sharedSpaces: {
      top: 'top',
      bottom: 'bottom'
    }
  });
  </script>
@stop
