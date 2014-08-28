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
        <div class="col-md-5"><h1>{{{ $project->name }}} <span class="badge">run 2</span></h1></div>
        <div class="col-md-7"><h2>{{{ Lang::get('project/show.description') }}}</h2></div>
    </div>
    <div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
            run overall progress 40% Complete (good)
        </div>
    </div>
</div>
<div class="tools">
    <div class="btn-group toolbox">
        <button type="button" class="btn btn-default">{{{ Lang::get('global.edit') }}}</button>
        <button type="button" class="btn btn-danger">{{{ Lang::get('global.delete') }}}</button>
    </div>
</div>
<div class="project">
    <ul class="nav nav-pills" role="tablist">
        <li class="active"><a href="#status" role="tab" data-toggle="tab">{{{ Lang::get('global.status') }}}</a></li>
        <li><a href="#tasks" role="tab" data-toggle="tab">{{{ Lang::get('global.tasks') }}}</a></li>
        <li><a href="#team" role="tab" data-toggle="tab">{{{ Lang::get('global.team') }}}</a></li>
        <li><a href="#calendar" role="tab" data-toggle="tab">{{{ Lang::get('global.calendar') }}}</a></li>
        <li><a href="#activity" role="tab" data-toggle="tab">{{{ Lang::get('global.activity') }}}</a></li>
        <li><a href="#documents" role="tab" data-toggle="tab">{{{ Lang::get('global.documents') }}}</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="status">
            <div class="jumbotron">
                <h1 class="status status-ok"><span class="glyphicon glyphicon-ok"></span> Good !</h1>

                <p>Everything's fine ! You can relax.</p>
            </div>
        </div>
        <div class="tab-pane fade" id="tasks">
            <div class="row">
                <div class="col-md-3">
                    <form action="" method="post" class="search">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-search"></span>
                                {{ Form::text('task-search', null, [
                                'class' => 'form-control', 'class' => 'form-control', 'id' => 'login', 'placeholder' =>
                                Lang::get('global.search')
                                ]) }}
                                <span class="input-group-addon glyphicon glyphicon-chevron-right"></span>
                            </div>
                        </div>
                    </form>
                    <div class="list-group">
                      @foreach($tickets as $ticket)
                        <a href="{{ URL::to('project/' . $project->id . 'r/ticket/' . $ticket->id) }}" class="list-group-item">
                            <h4 class="list-group-item-heading"><span class="label label-default">#{{{$ticket->ticket_id}}}</span> {{{$ticket->name}}}</h4>
                            <p><strong>points :</strong> 5</p>
                        </a>
                      @endforeach
                    </div>
                </div>
                <div id="pageLoad"></div>
            </div>
        </div>
        <div class="tab-pane fade" id="team" class="team">
            <div class="row">
                <div class="col-md-3">
                    <form action="" method="post" class="search">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-search"></span>
                                {{ Form::text('team-search', null, [
                                'class' => 'form-control', 'class' => 'form-control', 'id' => 'login', 'placeholder' =>
                                Lang::get('global.search')
                                ]) }}
                                <span class="input-group-addon glyphicon glyphicon-chevron-right"></span>
                            </div>
                        </div>
                    </form>
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                            <h4 class="list-group-item-heading">Michael FORASTE</h4>

                            <p class="list-group-item-text">lead</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Florian ROZE</h4>

                            <p class="list-group-item-text">designer</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Gaetan GUERAUD</h4>

                            <p class="list-group-item-text">reviewer</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Gabriel DE TASSIGNY</h4>

                            <p class="list-group-item-text">redactor</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="user">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="/images/shared/placeholders/michael.jpeg" alt="lindt">
                                    <div class="caption">
                                        <h3>lead</h3>
                                        <p>short description of this member</p>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" title="contact">
                                                <span class="glyphicon glyphicon-envelope"></span>
                                            </button>
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" title="profile">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" title="unreachable">
                                                <span class="glyphicon glyphicon-minus-sign"></span>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="remove">
                                                <span class="glyphicon glyphicon-remove-sign"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3>Michael FORASTE</h3>
                                        <hr />
                                        <p><strong>company :</strong> Evaneos</p>
                                        <p><strong>role in this project :</strong> Lead</p>
                                        <p><strong>role in this company :</strong> Lead</p>
                                        <p><strong>last connection :</strong> 03/08/2014 - 10:14</p>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="thumbnail" href="#">
                                            <img src="/images/shared/placeholders/Logo-Evaneos.jpg" alt="evaneos"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="calendar">
            <div class="calendar"></div>
        </div>
        <div class="tab-pane fade" id="activity">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                            <p class="list-group-item-text">this week</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <p class="list-group-item-text">last weeks</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <p class="list-group-item-text">this month</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <p class="list-group-item-text">this year</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content">
                        <canvas id="activity-graph" width="500" height="300"></canvas>
                    </div>
                </div>
                <div class="col-md-3">
                    <p><strong>tasks done :</strong> 6</p>
                    <p><strong>points remaining :</strong> 0</p>
                    <p><strong>objective :</strong> 35</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="documents">
          {{ Form::open(array('action'=>'App\Modules\Editor\Controllers\EditorController@postUpload', 'class'=>'dropzone', 'files' => true)) }}
          {{ Form::close(); }}
        </div>
    </div>
</div>
@stop
@section('script')
@parent
{{HTML::script('js/project/project.min.js')}}
<script>
  $('.list-group-item').click(function() {
    $("a.active").removeClass("active");
    $(this).addClass('active');
    $("#pageLoad").load($(this).attr("href"));
    return false;
  });
</script>
<script>
    var lineChartData = {
        labels: ["04/08", "05/08", "06/08", "07/08", "08/08", "09/08", "10/08"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [70, 60, 50, 40, 30, 30, 30]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [65, 55, 55, 55, 20, 20, 20]
            }
        ]

    }

    window.onload = function () {
        var ctx = document.getElementById("activity-graph").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });

        $(".calendar").fullCalendar({});
        $('*[data-toggle="tooltip"]').tooltip();
    }


</script>
@stop
