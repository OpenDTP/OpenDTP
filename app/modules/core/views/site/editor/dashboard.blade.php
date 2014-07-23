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
        {{HTML::image('/imageflow/img/2014_flyers_opendtp.jpg', "OpenDTP Flyer V1")}}
        {{HTML::image('/imageflow/img/2014_flyers_opendtp.jpg', "OpenDTP Flyer V2")}}
        {{HTML::image('/imageflow/img/2014_flyers_opendtp.jpg', "OpenDTP Flyer V3")}}
        {{HTML::image('/imageflow/img/2014_flyers_opendtp.jpg', "OpenDTP Flyer V4")}}
      </div>
    </div>
  </div>

			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">What's next</h3>
					</div>
					<div class="panel-body">
						<table class="table table-condensed">
						  <thead>
						  	<th>Date</th>
						  	<th>Origin</th>
						  </thead>
						  <tbody>
						  	<tr class="danger">
						  		<td>15/07 11:00</td>
						  		<td>Revue mise en page Bib News</td>
						  	</tr>
						  	<tr class="danger">
						  		<td>15/07 16:00</td>
						  		<td>Appel imprimeur W2P</td>
						  	</tr>
						  	<tr class="warning">
						  		<td>16/07 17:00</td>
						  		<td>Reu design flyers 2015</td>
						  	</tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Activity</h3>
					</div>
					<div class="panel-body">
						<div>
							<canvas id="activity-graph"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Notifications</h3>
					</div>
					<div class="panel-body">
						<table class="table table-condensed">
						  <thead>
						  	<th>Level</th>
						  	<th>Origin</th>
						  	<th>Notification</th>
						  </thead>
						  <tbody>
						  	<tr class="danger">
						  		<td>High</td>
						  		<td>Michael FORASTE</td>
						  		<td>Awaiting validation</td>
						  	</tr>
						  	<tr class="warning">
						  		<td>Medium</td>
						  		<td>Gaetan GUERAUD</td>
						  		<td>Template modified</td>
						  	</tr>
						  	<tr>
						  		<td>Low</td>
						  		<td>System</td>
						  		<td>New update !</td>
						  	</tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("activity-graph").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>
@stop
@section('script')
@parent
		{{HTML::script('imageflow/imageflow.js')}}
@stop
