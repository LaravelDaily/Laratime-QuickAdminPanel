@extends('layouts.app')

@section('content')
    <h3 class="page-title">Reports</h3>

    {!! Form::open(['method' => 'get']) !!}
        <div class="row">
            <div class="col-xs-2 col-md-2 form-group">
                {!! Form::label('from','From',['class' => 'control-label']) !!}
                {!! Form::text('from', old('from', Request::get('from', date('Y-m-d'))), ['class' => 'form-control date', 'placeholder' => '']) !!}
            </div>
            <div class="col-xs-2 col-md-2 form-group">
                {!! Form::label('to','To',['class' => 'control-label']) !!}
                {!! Form::text('to', old('to', Request::get('to', date('Y-m-d'))), ['class' => 'form-control date', 'placeholder' => '']) !!}
            </div>
            <div class="col-xs-4">
                <label class="control-label">&nbsp;</label><br>
                {!! Form::submit('Select month',['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            Report
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Time by projects</th>
                            <th></th>
                        </tr>
                    @foreach($projects_time as $projects)
                        <tr>
                            <th>{{ $projects['name'] }}</th>
                            <td>{{ gmdate("H:i:s", $projects['time']) }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Time by work type</th>
                            <th></th>
                        </tr>
                    @foreach($work_type_time as $work_type)
                        <tr>
                            <th>{{ $work_type['name'] }}</th>
                            <td>{{ gmdate("H:i:s", $work_type['time']) }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>
@stop
