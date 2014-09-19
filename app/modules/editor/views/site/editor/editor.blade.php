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
<div class="editable" style="overflow: auto; padding: 10px; margin: 10px;  border-style:groove;">
	<h3>SOFTWARE COMPANY</h3>
	 <img src="images/shared/yourlogo.png" alt="logo" style="width:252px;height:140px">
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non luctus justo, in mollis</br> purus. Sed luctus elit a rutrum dignissim. Sed venenatis ex nec sagittis malesuada. Etiam</br> porta massa lacus, eget molestie risus porta ac. Duis vehicula, nibh a finibus mattis, velit elit</br> rutrum nisi, nec vehicula ligula eros ac dolor. Proin congue nisl tincidunt blandit egestas. </br>Sed urna urna, gravida ut convallis a, pharetra a nisi. Suspendisse urna mauris, euismod et efficitur</br> ac, euismod sit amet tellus. Donec scelerisque ultricies euismod.
</br></br>Donec laoreet, nulla eget hendrerit eleifend, tortor diam venenatis enim, et auctor lorem nisi </br>ac urna. Etiam vitae dui pulvinar, laoreet ipsum at, posuere leo. Morbi eget ligula a nisi sagit-</br>tis consectetur in id tellus. Suspendisse nisl risus, iaculis eget risus sed, blandit blandit risus. </br>Integer porttitor nibh commodo ligula sollicitudin, in suscipit libero mattis. Donec ut nibh</br> lectus. Ut dignissim risus eros, ac volutpat ligula tempus vel. Proin nec tristique nulla, auc-</br>tor rutrum ex. Integer scelerisque dolor eget ipsum condimentum ullamcorper. Ut congue </br>pharetra tortor, eu tempus magna iaculis ac. Maecenas bibendum sed sem in dignissim.</br> Pellentesque sagittis lacus dui, nec iaculis odio eleifend sit amet. Etiam malesuada est eu felis</br> lacinia, at auctor ligula feugiat. Duis malesuada lacinia nunc, vel fringilla nisl aliquam eget.</br> Integer feugiat odio id molestie sagittis.
</p>
</div>
@stop
@section('script')
@parent
{{HTML::script('js/core/core.min.js')}}
{{HTML::script('tinymce/tinymce.js')}}
<script>
    tinymce.init({
        selector: ".editable",
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
            text: 'Export document',
            icon: 'save',
            onclick: function() {
                setTimeout(function(){
        		window.location.href = "http://preprod.opendtp.eu/uploads/demo.indd";
    			}, 8000);
            }
        });
    }
});
</script>
@stop
