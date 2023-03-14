@extends('cms::backend.layouts.cms_http')

@push('styles')
    <link rel="stylesheet" href="{{ \Module::asset('cms:vendors/bootstrap-fileinput/bootstrap-fileinput.css') }}">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ \Module::asset('cms:vendors/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
@endpush

@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
@endsection

@section('cms-component')
    <div class="cms-buttons-">
        <div class="page-title">{{ __('cms::base.users.'.strtoupper($type)) }}</div>
        <div class="actions-component">
            @if(!in_array($type, ['ALL', 'ROOT']))
              <a class="btn btn-info" href="{{ route('cms::users::create', $type) }}">{{ __('cms::base.users.create') }}</a>
            @endif
            <a class="btn btn-success" href="javascript:;" id="refreshDataTable">{{ __('cms::base.refreshDataTable') }}</a>
        </div>
    </div>
@endsection

@section('content')

<table class="table table-bordered data-table" id="data-table">
    <thead>
        <tr>
            <th>{{ __('cms::base.users.table.id') }}</th>
            <th>{{ __('cms::base.users.table.name') }}</th>
            <th>{{ __('cms::base.users.table.type') }}</th>
            <th>{{ __('cms::base.users.table.username') }}</th>
            <th>{{ __('cms::base.users.table.phone_number') }}</th>
            <th>{{ __('cms::base.users.table.email') }}</th>
            <th>{{ __('cms::base.users.table.verification_code') }}</th>
            <th>{{ __('cms::base.users.table.status') }}</th>
            <th>{{ __('cms::base.users.table.registration_type') }}</th>
            <th>{{ __('cms::base.users.table.actions') }}</th>
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
                url : "{!! route('cms::users::data') !!}",
                method: "GET",
                data : {
                    'type' : "{{$type}}"
                },
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
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'username',
                    name: 'username'
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
                    data: 'verification_code',
                    name: 'verification_code'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'registration_type',
                    name: 'registration_type'
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
