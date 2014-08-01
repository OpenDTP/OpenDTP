@extends('layouts.default')
@section('title')
{{{ $project->name }}} ::
@parent
@stop
@section('css')
@parent
{{HTML::style('css/project/project.min.css')}}
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-5"><h1>{{{ $project->name }}}</h1></div>
        <div class="col-md-7"><h2>{{{ Lang::get('project/show.description') }}}</h2></div>
    </div>
</div>
<div class="project">
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#status" role="tab" data-toggle="tab">{{{ Lang::get('global.status') }}}</a></li>
        <li><a href="#team" role="tab" data-toggle="tab">{{{ Lang::get('global.team') }}}</a></li>
        <li><a href="#calendar" role="tab" data-toggle="tab">{{{ Lang::get('global.calendar') }}}</a></li>
        <li><a href="#activity" role="tab" data-toggle="tab">{{{ Lang::get('global.activity') }}}</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="status">
            <div class="jumbotron">
                <h1 class="status status-ok"><span class="glyphicon glyphicon-ok"></span> Good !</h1>
                <p>Everything's fine ! You can relax.</p>
            </div>
        </div>
        <div class="tab-pane fade" id="team" class="team">
            <h2>{{{ Lang::get('global.team') }}}</h2>
            <form action="" method="post" class="search">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-search"></span>
                        {{ Form::text('team-search', null, [
                        'class' => 'form-control', 'class' => 'form-control', 'id' => 'login', 'placeholder' => Lang::get('global.search')
                        ]) }}
                    </div>
                </div>
            </form>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">Michael FORASTE</h4>
                    <p class="list-group-item-text">member 1 of the team</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Florian ROZE</h4>
                    <p class="list-group-item-text">member 1 of the team</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Gaetan GUERAUD</h4>
                    <p class="list-group-item-text">member 1 of the team</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Gabriel DE TASSIGNY</h4>
                    <p class="list-group-item-text">member 1 of the team</p>
                </a>
            </div>
        </div>
        <div class="tab-pane fade" id="calendar">
            <h2>{{{ Lang::get('global.calendar') }}}</h2>
            <div class="calendar"></div>
        </div>
        <div class="tab-pane fade" id="activity">
            <h2>{{{ Lang::get('global.activity') }}}</h2>
            <canvas id="activity-graph"></canvas>
        </div>
    </div>
</div>
@stop
@section('script')
@parent
{{HTML::script('js/project/project.min.js')}}
<script>
    var randomScalingFactor = function () {
        return Math.round(Math.random() * 100)
    };
    var lineChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
            }
        ]

    }

    window.onload = function () {
        var ctx = document.getElementById("activity-graph").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });

        $(".calendar").fullCalendar({});
    }


</script>
@stop