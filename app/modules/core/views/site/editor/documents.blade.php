@extends('site.layouts.default')
@section('title')
{{{ Lang::get('editor/editor.editor_title_docs') }}} ::
@parent
@stop
{{-- Content --}}
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Publications en cours</h3>
  </div>
  <div class="panel-body">
    <div id="jstree" class="col-md-3">
      <ul>
        <li>
          Publications
          <ul>
            <li>
              <span class="error">Flyers salon Smile 2014</span>
              <ul>
                <li>
                  <span class="error">Fonts</span>
                  <ul>
                    <li data-jstree='{"icon":"glyphicon glyphicon-font"}'>Helvetica</li>
                    <li data-jstree='{"icon":"glyphicon glyphicon-font"}'>Helvetica Neue</li>
                    <li data-jstree='{"icon":"glyphicon glyphicon-font"}' class="error">Zapf Dingbats</li>
                  </ul>
                </li>
                <li>
                  Images
                  <ul>
                    <li data-jstree='{"icon":"glyphicon glyphicon-picture"}'>logo.eps</li>
                    <li data-jstree='{"icon":"glyphicon glyphicon-picture"}'>logo-black.eps</li>
                  </ul>
                </li>
                <li>
                  Articles
                  <ul>
                    <li data-jstree='{"icon":"glyphicon glyphicon-list-alt"}'>OpenDTP</li>
                  </ul>
                </li>
                <li data-jstree='{"icon":"glyphicon glyphicon-book"}'>odtp_flyer_v3.indd</li>
              </ul>
            </li>
            <li>
              OpenDTP Bib mag
              <ul>
                <li>plop</li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          Templates
          <ul>
            <li>plop</li>
          </ul>
        </li>
        <li>
          Fonts
          <ul>
            <li>plop</li>
          </ul>
        </li>
        <li>
          Images
          <ul>
            <li>plop</li>
          </ul>
        </li>
        <li>
          Articles
          <ul>
            <li>plop</li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="col-md-9">
      <div class="document-header text-center">
        <h3>Flyers salon Smile 2014</h3>
        <p>
          Delivery date : <code>03/11/2014</code><br />
          You have <code>1</code> error in this document
        </p>
        <div class="document-preview">
          <img src="/imageflow/img/2014_flyers_opendtp.jpg" alt="">
        </div>
      </div>
      <div class="panel-body">
        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a href="#summary" data-toggle="tab">Summary</a></li>
          <li><a href="#properties" data-toggle="tab">Properties</a></li>
          <li><a href="#profiles" data-toggle="tab">Profiles</a></li>
          <li><a href="#preflight" data-toggle="tab">Preflight</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade in active" id="summary">
  <h3>Description</h3>
            Bacon ipsum dolor sit amet t-bone shankle bacon shoulder, short ribs pork chicken boudin filet mignon doner sausage ground round brisket venison.
            T-bone ribeye meatloaf ball tip bacon cow strip steak, bresaola sausage ham pork loin. Pork pork belly pastrami pork chop shoulder, pig venison frankfurter pork loin ham hamburger short loin beef corned beef.
            Short ribs cow ham hock chicken landjaeger sirloin spare ribs meatloaf leberkas. Tongue jowl venison filet mignon boudin short ribs fatback.
            Strip steak salami beef ribs tongue sausage leberkas cow flank kevin jowl chuck tail rump. Doner pork chop tongue ball tip, drumstick pork ham capicola salami.
            Pork chop beef ribs leberkas ham. Shank jowl beef ribs leberkas, bresaola tail ball tip chuck. Cow chicken prosciutto pork belly, pork loin ground round rump salami meatloaf ball tip jerky strip steak frankfurter.
          </div>
          <div class="tab-pane fade" id="properties">
            <div class="input-group col-md-4">
              <span class="input-group-addon">Name</span>
              <p><input type="text" class="form-control" placeholder="Project Name"></p>
            </div>
            <p class='pull-right'>
              <input type="checkbox" id="test1" /><label for="test1"><span class="ui"></span>Active</label>
            </p>
            <p>Description:</p>
            <textarea class="form-control" rows="5"></textarea>
          </div>
          <div class="tab-pane fade" id="profiles"><h3>PDF Profiles:</h3><br\>
            <p><input type="checkbox" id="profile1" /><label for="profile1"><span class="ui"></span>Profile 1</label></p>
            <p><input type="checkbox" id="profile2" /><label for="profile2"><span class="ui"></span>Profile 2</label></p>
            <p><input type="checkbox" id="profile3" /><label for="profile3"><span class="ui"></span>Profile 3</label></p>
          </div>
          <div class="tab-pane fade error" id="preflight">
            <pre>Error 1: Missing Font - Zapf Dingbats
            </pre></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@section('script')
@parent
{{HTML::script('assets/js/jstree.min.js')}}
<script>
$(function ()
{
  $('#jstree').jstree({
    "core" : {
      "check_callback" : true
    },
    "plugins" : [ "contextmenu", "search", "state" ]
  });
});
</script>
@stop
