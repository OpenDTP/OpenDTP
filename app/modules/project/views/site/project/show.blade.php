@extends('layouts.default')
@section('title')
{{{ $project->name }}} ::
@parent
@stop
@section('css')
@parent
{{HTML::style('css/shared/fullcalendar.min.css')}}
{{HTML::style('css/project/project.min.css')}}
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-5"><h1>{{{ $project->name }}} <span class="badge">Run 2</span></h1></div>
        <div class="col-md-7"><h2>{{{ Lang::get('project/show.description') }}}</h2></div>
    </div>
    <div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
            Run overall progress 40% Complete (good)
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
    <ul class="nav nav-pills" id="#my-tabs" role="tablist">
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
                        <a href="{{ URL::to('project/' . $project->id . '/ticket/' . $ticket->id) }}" class="list-group-item">
                            <h4 class="list-group-item-heading"><span class="label label-default">#{{{$ticket->ticket_id}}}</span> {{{$ticket->name}}}</h4>
                            <p><strong>points :</strong> 5</p>
                        </a>
                      @endforeach
                    </div>
                </div>
                <div id="ticketLoad"></div>
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
                      @foreach($users as $user)
                        <a href="{{ URL::to('user/' . $user->id) }}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{{$user->firstname}}} {{{$user->lastname}}}</h4>
                            @if ($user->id == 1)
                                <p><strong>Leader</strong></p>
                            @else
                                <p><strong>Member</strong></p>
                            @endif
                        </a>
                      @endforeach
                    </div>
                </div>
                   <div id="teamLoad"></div>
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
            <form action="upload_file.php" method="post"
                enctype="multipart/form-data">
                <label for="file">Document:</label>
                <input type="file" name="file" id="file"><br>
                <input type="button" value="Upload" id="click" onclick="fake(this);"/>​

            </form>
        </div>
    </div>
</div>
@stop
@section('script')
@parent
{{HTML::script('js/project/project.min.js')}}
{{HTML::script('js/shared/fullcalendar.min.js')}}
<script>
  $('.list-group-item').click(function() {
    $("a.active").removeClass("active");
    $(this).addClass('active');
    $("#ticketLoad").load($(this).attr("href"));
    $("#teamLoad").load($(this).attr("href"));
    return false;
  });
      function fake(obj) {
        obj.disabled = true;
      setTimeout(function(){
        window.location.href = "http://opendtp.dev/editor";
    }, 5000);
  }

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

        $('*[data-toggle="tooltip"]').tooltip();
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('.calendar').fullCalendar({
                        events: [
                            {
                                title  : 'OpenDTP Demo',
                                start  : '2014-09-19',
                                backgroundColor  : '#BABABA'
                            },
                            {
                                title  : '#1 Ticket!',
                                start  : '2014-09-01',
                                end    : '2014-09-03'
                            },
                            {
                                title  : '#2 Second Ticket',
                                start  : '2014-09-02',
                                end    : '2014-09-04'
                            }
                        ]
                    });
        });
    }

</script>
@stop
