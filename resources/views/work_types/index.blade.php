@extends('layouts.app')

@section('content')
    <h3 class="page-title">Work types</h3>

    <p>
        <a href="{{ route('work_types.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($work_types) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Name</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($work_types) > 0)
                        @foreach ($work_types as $work_type)
                            <tr data-entry-id="{{ $work_type->id }}">
                                <td></td>
                                <td>{{ $work_type->name }}</td>
                                <td>
                                    <a href="{{ route('work_types.show',[$work_type->id]) }}" class="btn btn-xs btn-primary">View</a>
                                    <a href="{{ route('work_types.edit',[$work_type->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['work_types.destroy', $work_type->id])) !!}
                                    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('work_types.mass_destroy') }}';
    </script>
@endsection
