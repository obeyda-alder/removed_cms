@extends('cms::backend.layouts.cms_http')

@section('breadcrumbs')
    {{ Breadcrumbs::render('categories') }}
@endsection

@section('cms-component')
    <div class="cms-buttons-">
        <div class="page-title">{{ __('cms::base.categories.new') }}</div>
    </div>
@endsection

@section('content')

<form class="forms-sample" method="POST" onsubmit="OnFormSubmit(event)" action="{{ route('cms::categories::store') }}">
    @csrf
    <div class="row">
        <div class="col-md-6">

            @include('cms::backend.includes.inputs.text', [
                'options' => [
                    'id'          => 'name',
                    'name'        => 'name',
                    'label'       => __('cms::base.categories.fields.name.label'),
                    'placeholder' => __('cms::base.categories.fields.name.placeholder'),
                    'help'        => __('cms::base.categories.fields.name.help'),
                    'value'       => old('name')
                ]
            ])

            <div class="row">
                <div class="col-9 pr-0">
                    @include('cms::backend.includes.inputs.text', [
                        'options' => [
                            'id'          => 'code',
                            'name'        => 'code',
                            'label'       => __('cms::base.categories.fields.code.label'),
                            'placeholder' => __('cms::base.categories.fields.code.placeholder'),
                            'help'        => __('cms::base.categories.fields.code.help'),
                            'value'       => old('code')
                        ]
                    ])
                </div>
                <div class="col-3 code-gen">
                    <button class="btn btn-info btn-genrate-code" id="genrate_code" >{{  __('cms::base.categories.genrate_code') }}</button>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    @include('cms::backend.includes.inputs.text', [
                        'options' => [
                            'id'          => 'from',
                            'name'        => 'from',
                            'type'        => 'number',
                            'label'       => __('cms::base.categories.fields.from.label'),
                            'placeholder' => __('cms::base.categories.fields.from.placeholder'),
                            // 'help'        => __('cms::base.categories.fields.from.help'),
                            'value'       => old('from')
                        ]
                    ])
                </div>
                <div class="col-6">
                    @include('cms::backend.includes.inputs.text', [
                        'options' => [
                            'id'          => 'to',
                            'name'        => 'to',
                            'type'        => 'number',
                            'label'       => __('cms::base.categories.fields.to.label'),
                            'placeholder' => __('cms::base.categories.fields.to.placeholder'),
                            // 'help'        => __('cms::base.categories.fields.to.help'),
                            'value'       => old('to')
                        ]
                    ])
                </div>
            </div>

            @include('cms::backend.includes.inputs.text', [
                'options' => [
                    'id'          => 'price',
                    'name'        => 'price',
                    'type'        => 'number',
                    'step'        => '0.01',
                    'label'       => __('cms::base.categories.fields.price.label'),
                    'placeholder' => __('cms::base.categories.fields.price.placeholder'),
                    // 'help'        => __('cms::base.categories.fields.price.help'),
                    'value'       => old('price')
                ]
            ])

            @include('cms::backend.includes.inputs.select', [
                'options' => [
                    'id'          => 'status',
                    'nullable'    => false,
                    'name'        => 'status',
                    'label'       => __('cms::base.categories.fields.status.label'),
                    'placeholder' => __('cms::base.categories.fields.status.placeholder'),
                    'help'        => __('cms::base.categories.fields.status.help'),
                    'data'        => ["ACTIVE", "NOT_ACTIVE"],
                    'selected'    => old('status'),
                    'value'       => function($data, $key, $value){ return $value; },
                    'text'        => function($data, $key, $value){ return __('cms::base.categories.fields.status.'.$value); },
                    'select'      => function($data, $selected, $key, $value){ return $selected == $value; },
                ]
            ])
        </div>
    </div>
    @include('cms::backend.includes.buttons', ['type' => 'create'])
</form>
@endsection

@push('styles')
<style>
    .code-gen{
        padding: 0;
        margin-top: 23px;
    }
    .btn-genrate-code{
        width: 100%;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush

@push('scripts')
<script>
    $('#genrate_code').click(function (e) {
        e.preventDefault();
        e.stopPropagation();

        $.ajax({
            method     : 'GET',
            url        : "{!! route('cms::categories::generateCode') !!}",
            data       : {},
            statusCode : {
                200 : function(data) {
                    $('#code').val(data);
                }
            }
        });
    })
</script>
@endpush
