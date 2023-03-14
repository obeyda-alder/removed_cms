@extends('cms::backend.layouts.cms_http')

@push('styles')
    <link rel="stylesheet" href="{{ \Module::asset('cms:vendors/bootstrap-fileinput/bootstrap-fileinput.css') }}">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ \Module::asset('cms:vendors/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
@endpush

@section('breadcrumbs')
    {{ Breadcrumbs::render('categories') }}
@endsection
@section('cms-component')
    <div class="cms-buttons-">
        <div class="page-title">{{ __('cms::base.categories.label') }}</div>
        <div class="actions-component">
            <a class="btn btn-info" href="{{ route('cms::categories::create') }}">{{ __('cms::base.categories.create') }}</a>
            <a class="btn btn-success" href="javascript:;" id="refreshDataTable">{{ __('cms::base.refreshDataTable') }}</a>
        </div>
    </div>
@endsection

@section('content')

<table class="table table-bordered data-table" id="data-table">
    <thead>
        <tr>
            <th>{{ __('cms::base.categories.table.id') }}</th>
            <th>{{ __('cms::base.categories.table.name') }}</th>
            <th>{{ __('cms::base.categories.table.code') }}</th>
            <th>{{ __('cms::base.categories.table.from_to') }}</th>
            <th>{{ __('cms::base.categories.table.price') }}</th>
            <th>{{ __('cms::base.categories.table.status') }}</th>
            <th>{{ __('cms::base.categories.table.actions') }}</th>
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
                url : "{!! route('cms::categories::data') !!}",
                method: "GET",
                data : {},
            },
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'from_to',
                    name: 'from_to'
                },
                {
                    data: 'price',
                    name: 'price'
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
