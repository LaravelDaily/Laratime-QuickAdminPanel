@extends('layouts.app')

@section('content')
    <h3 class="page-title">Time entries</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Project</th>
                            <td>{{ $time_entry->project->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>Work type</th>
                            <td>{{ $time_entry->work_type->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>Start time</th>
                            <td>{{ $time_entry->start_time }}</td>
                        </tr>
                        <tr>
                            <th>End time</th>
                            <td>{{ $time_entry->end_time }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('time_entries.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop
