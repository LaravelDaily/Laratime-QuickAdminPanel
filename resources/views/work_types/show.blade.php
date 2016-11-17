@extends('layouts.app')

@section('content')
    <h3 class="page-title">Work types</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Name</th>
                            <td>{{ $work_type->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('work_types.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop
