@extends('cms::backend.layouts.cms_http')

@push('styles')
    <link rel="stylesheet" href="{{ \Module::asset('cms:vendors/bootstrap-fileinput/bootstrap-fileinput.css') }}">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ \Module::asset('cms:vendors/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
@endpush

@section('breadcrumbs')
    {{ Breadcrumbs::render('agencies') }}
@endsection
@section('cms-component')
    <div class="cms-buttons-">
        <div class="page-title">{{ __('cms::base.agencies.'.strtoupper($agencies_type)) }}</div>
        <div class="actions-component">
            <a class="btn btn-info" href="{{ route('cms::agencies::create', $agencies_type) }}">{{ __('cms::base.agencies.create') }}</a>
            <a class="btn btn-success" href="javascript:;" id="refreshDataTable">{{ __('cms::base.refreshDataTable') }}</a>
        </div>
    </div>
@endsection

@section('content')

<table class="table table-bordered data-table" id="data-table">
    <thead>
        <tr>
            <th>{{ __('cms::base.agencies.table.id') }}</th>
            <th>{{ __('cms::base.agencies.table.title') }}</th>
            <th>{{ __('cms::base.agencies.table.first_name') }}</th>
            <th>{{ __('cms::base.agencies.table.last_name') }}</th>
            <th>{{ __('cms::base.agencies.table.phone_number') }}</th>
            <th>{{ __('cms::base.agencies.table.email') }}</th>
            <th>{{ __('cms::base.agencies.table.status') }}</th>
            <th>{{ __('cms::base.agencies.table.actions') }}</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@push('styles')
    <link rel="stylesheet" href="{{ \Module::asset('cms:vendors/datatables/datatables.bundle.css') }}">
@endpush
@push('scripts')
    <script src="{{ \Module::asset('cms:vendors/datatables/datatables.bundle.js') }}"></script>
@endpush

@endsection

@push('styles')
<style>

</style>
@endpush
@push('scripts')
<script>
    $(function() {
        $.extend(options, {
            ajax: {
                url : "{!! route('cms::agencies::data') !!}",
                method: "GET",
                data : {
                    'agencies_type' : "{{$agencies_type}}"
                },
            },
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'first_name',
                    name: 'first_name'
                },
                {
                    data: 'last_name',
                    name: 'last_name'
                },
                {
                    data: 'phone_number',
                    name: 'phone_number'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    searchable: false,
                    orderable:  false,
                    render: function ( data, type, row, meta ) {
                        return dataTableActions(data,type,row,meta);
                    }
                }
            ],
        });
        var table = $('.data-table').DataTable(options);
        $("#refreshDataTable").on("click", function (e) {
            e.preventDefault(), table.ajax.reload();
        });
    });
  </script>
@endpush
