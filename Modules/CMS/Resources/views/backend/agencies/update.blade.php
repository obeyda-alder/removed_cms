@extends('cms::backend.layouts.cms_http')

@section('breadcrumbs')
    {{ Breadcrumbs::render('agencies') }}
@endsection

@section('cms-component')
    <div class="cms-buttons-">
        <div class="page-title">{{ __('cms::base.agencies.update', [ 'name' => $data->first_name ]) }}</div>
    </div>
@endsection

@section('content')

<form class="forms-sample" method="POST" onsubmit="OnFormSubmit(event)" action="{{ route('cms::agencies::e-store') }}">
    @csrf
    <input type="hidden" name="agen_id" value="{{ $data->id }}">
    <input type="hidden" name="agencies_type" value="{{$agencies_type}}">
    <div class="row">
        <div class="col-md-6">

            @include('cms::backend.includes.inputs.text', [
                'options' => [
                    'id'          => 'first_name',
                    'name'        => 'first_name',
                    'label'       => __('cms::base.agencies.fields.first_name.label'),
                    'placeholder' => __('cms::base.agencies.fields.first_name.placeholder'),
                    'help'        => __('cms::base.agencies.fields.first_name.help'),
                    'value'       => old('first_name', $data->first_name)
                ]
            ])

            @include('cms::backend.includes.inputs.text', [
                'options' => [
                    'id'          => 'last_name',
                    'name'        => 'last_name',
                    'label'       => __('cms::base.agencies.fields.last_name.label'),
                    'placeholder' => __('cms::base.agencies.fields.last_name.placeholder'),
                    'help'        => __('cms::base.agencies.fields.last_name.help'),
                    'value'       => old('last_name', $data->last_name)
                ]
            ])


            @include('cms::backend.includes.inputs.text', [
                'options' => [
                    'id'          => 'phone_number',
                    'name'        => 'phone_number',
                    'label'       => __('cms::base.agencies.fields.phone_number.label'),
                    'placeholder' => __('cms::base.agencies.fields.phone_number.placeholder'),
                    'help'        => __('cms::base.agencies.fields.phone_number.help'),
                    'value'       => old('phone_number', $data->phone_number)
                ]
            ])

            @include('cms::backend.includes.inputs.select', [
                'options' => [
                    'id'          => 'status',
                    'nullable'    => false,
                    'name'        => 'status',
                    'label'       => __('cms::base.agencies.fields.status.label'),
                    'placeholder' => __('cms::base.agencies.fields.status.placeholder'),
                    'help'        => __('cms::base.agencies.fields.status.help'),
                    'data'        => [0,1,2],
                    'selected'    => old('status', $data->status),
                    'value'       => function($data, $key, $value){ return $value; },
                    'text'        => function($data, $key, $value){ return __('cms::base.agencies.fields.status.'.$value); },
                    'select'      => function($data, $selected, $key, $value){ return $selected == $value; },
                ]
            ])

            @include('cms::backend.includes.inputs.text', [
                'options' => [
                    'id'          => 'email',
                    'name'        => 'email',
                    'type'        => 'email',
                    'label'       => __('cms::base.agencies.fields.email.label'),
                    'placeholder' => __('cms::base.agencies.fields.email.placeholder'),
                    'help'        => __('cms::base.agencies.fields.email.help'),
                    'value'       => old('email', $data->email)
                ]
            ])

            @include('cms::backend.includes.inputs.text', [
                'options' => [
                    'id'          => 'title',
                    'name'        => 'title',
                    'label'       => __('cms::base.agencies.fields.title.label'),
                    'placeholder' => __('cms::base.agencies.fields.title.placeholder'),
                    'help'        => __('cms::base.agencies.fields.title.help'),
                    'value'       => old('title', $data->translate(app()->getLocale())->title ?? '')
                ]
            ])

            @include('cms::backend.includes.inputs.textarea', [
                'options' => [
                    'name'        => 'description',
                    'label'       => __('cms::base.agencies.fields.description.label'),
                    'placeholder' => __('cms::base.agencies.fields.description.placeholder'),
                    'help'        => __('cms::base.agencies.fields.description.help'),
                    'rows'        => 6,
                    'value'       => old('description', $data->translate(app()->getLocale())->description ?? '')
                ]
            ])

            @if($agencies_type == "master_agent")
                @include('cms::backend.includes.inputs.select', [
                    'options' => [
                        'id'          => 'user_id',
                        'nullable'    => true,
                        'name'        => 'user_id',
                        'label'       => __('cms::base.agencies.fields.user_id.label'),
                        'placeholder' => __('cms::base.agencies.fields.user_id.placeholder'),
                        'help'        => __('cms::base.agencies.fields.user_id.placeholder'),
                        'data'        => $users,
                        'selected'    => old('user_id', $data->user_id),
                        'value'       => function($data, $key, $value){ return $value->id; },
                        'text'        => function($data, $key, $value){ return $value->name ?? $value->username; },
                        'select'      => function($data, $selected, $key, $value){ return $selected == $value->id; },
                    ]
                ])
            @elseif($agencies_type == "sub_agent")
                @include('cms::backend.includes.inputs.select', [
                    'options' => [
                        'id'          => 'master_agent_id',
                        'nullable'    => true,
                        'name'        => 'master_agent_id',
                        'label'       => __('cms::base.agencies.fields.master_agent_id.label'),
                        'placeholder' => __('cms::base.agencies.fields.master_agent_id.placeholder'),
                        'help'        => __('cms::base.agencies.fields.master_agent_id.placeholder'),
                        'data'        => $agencies,
                        'selected'    => old('master_agent_id', $data->master_agent_id),
                        'value'       => function($data, $key, $value){ return $value->id; },
                        'text'        => function($data, $key, $value){ return $value->name ?? $value->first_name; },
                        'select'      => function($data, $selected, $key, $value){ return $selected == $value->id; },
                    ]
                ])
            @endif

            @include('cms::backend.includes.inputs.select', [
                'options' => [
                    'id'          => 'country_selector',
                    'nullable'    => true,
                    'name'        => 'country_id',
                    'label'       => __('cms::base.countries.label'),
                    'placeholder' => __('cms::base.countries.placeholder'),
                    'help'        => null,
                    'data'        => $countries,
                    'selected'    => old('country_id', $data->country_id),
                    'value'       => function($data, $key, $value){ return $value->id; },
                    'text'        => function($data, $key, $value){ return $value->{'name_'.app()->getLocale()  }; },
                    'select'      => function($data, $selected, $key, $value){ return $selected == $value->id; },
                ]
            ])
            @include('cms::backend.includes.inputs.select', [
                'options' => [
                    'id'          => 'cities_selector',
                    'nullable'    => true,
                    'name'        => 'city_id',
                    'label'       => __('cms::base.cities.label'),
                    'placeholder' => __('cms::base.cities.placeholder'),
                    'help'        => null,
                    'data'        => [],
                    'selected'    => old('city_id', $data->city_id),
                    'value'       => function($data, $key, $value){ return $value->id; },
                    'text'        => function($data, $key, $value){ return $value->{'name_'.app()->getLocale()  }; },
                    'select'      => function($data, $selected, $key, $value){ return $selected == $value->id; },
                ]
            ])
            @include('cms::backend.includes.inputs.select', [
                'options' => [
                    'id'          => 'municipalities_selector',
                    'nullable'    => true,
                    'name'        => 'municipality_id',
                    'label'       => __('cms::base.municipalities.label'),
                    'placeholder' => __('cms::base.municipalities.placeholder'),
                    'help'        => null,
                    'data'        => [],
                    'selected'    => old('municipality_id', $data->municipality_id),
                    'value'       => function($data, $key, $value){ return $value->id; },
                    'text'        => function($data, $key, $value){ return $value->{'name_'.app()->getLocale()  }; },
                    'select'      => function($data, $selected, $key, $value){ return $selected == $value->id; },
                ]
            ])
            @include('cms::backend.includes.inputs.select', [
                'options' => [
                    'id'          => 'neighborhoodes_selector',
                    'nullable'    => true,
                    'name'        => 'neighborhood_id',
                    'label'       => __('cms::base.neighborhoodes.label'),
                    'placeholder' => __('cms::base.neighborhoodes.placeholder'),
                    'help'        => null,
                    'data'        => [],
                    'selected'    => old('neighborhood_id', $data->neighborhood_id),
                    'value'       => function($data, $key, $value){ return $value->id; },
                    'text'        => function($data, $key, $value){ return $value->{'name_'.app()->getLocale() }; },
                    'select'      => function($data, $selected, $key, $value){ return $selected == $value->id; },
                ]
            ])

            @include('cms::backend.includes.inputs.text', [
                'options' => [
                    'id'          => 'latitude',
                    'name'        => 'latitude',
                    'type'        => 'number',
                    'label'       => __('cms::base.agencies.fields.latitude.label'),
                    'placeholder' => __('cms::base.agencies.fields.latitude.placeholder'),
                    'help'        => __('cms::base.agencies.fields.latitude.help'),
                    'value'       => old('latitude', $data->latitude)
                ]
            ])

            @include('cms::backend.includes.inputs.text', [
                'options' => [
                    'id'          => 'longitude',
                    'name'        => 'longitude',
                    'type'        => 'number',
                    'label'       => __('cms::base.agencies.fields.longitude.label'),
                    'placeholder' => __('cms::base.agencies.fields.longitude.placeholder'),
                    'help'        => __('cms::base.agencies.fields.longitude.help'),
                    'value'       => old('longitude', $data->longitude)
                ]
            ])

            @include('cms::backend.includes.inputs.textarea', [
                'options' => [
                    'name'        => 'desc_address',
                    'label'       => __('cms::base.agencies.fields.desc_address.label'),
                    'placeholder' => __('cms::base.agencies.fields.desc_address.placeholder'),
                    'help'        => __('cms::base.agencies.fields.desc_address.help'),
                    'rows'        => 6,
                    'value'       => old('desc_address', $data->desc_address)
                ]
            ])
            <div class="row">
                <div class="col-md-6">
                    @include('cms::backend.includes.inputs.text', [
                        'options' => [
                            'id'          => 'iban',
                            'name'        => 'iban',
                            'label'       => __('cms::base.agencies.fields.iban.label'),
                            'placeholder' => __('cms::base.agencies.fields.iban.placeholder'),
                            'help'        => __('cms::base.agencies.fields.iban.help'),
                            'value'       => old('iban', $data->iban)
                        ]
                    ])
                </div>
                <div class="col-md-6">
                    @include('cms::backend.includes.inputs.text', [
                        'options' => [
                            'id'          => 'iban_name',
                            'name'        => 'iban_name',
                            'label'       => __('cms::base.agencies.fields.iban_name.label'),
                            'placeholder' => __('cms::base.agencies.fields.iban_name.placeholder'),
                            'help'        => __('cms::base.agencies.fields.iban_name.help'),
                            'value'       => old('iban_name', $data->iban_name)
                        ]
                    ])
                </div>
                <div class="col-md-6">
                    @include('cms::backend.includes.inputs.text', [
                        'options' => [
                            'id'          => 'iban_type',
                            'name'        => 'iban_type',
                            'label'       => __('cms::base.agencies.fields.iban_type.label'),
                            'placeholder' => __('cms::base.agencies.fields.iban_type.placeholder'),
                            'help'        => __('cms::base.agencies.fields.iban_type.help'),
                            'value'       => old('iban_type', $data->iban_type)
                        ]
                    ])
                </div>
            </div>
        </div>
    </div>
    @include('cms::backend.includes.buttons', ['type' => 'update'])
</form>
@endsection
@push('scripts')
<script>
    $("#country_selector").change(function(){
        let country_id = $(this).children("option:selected").val();
        getCitiy(country_id);
    });
    $("#cities_selector").change(function(){
        let city_id = $(this).children("option:selected").val();
        getMunicipalites(city_id);
    });
    $("#municipalities_selector").change(function(){
        let municipality_id = $(this).children("option:selected").val();
        getNeighborhoodes(municipality_id);
    });
    function getCitiy(country_id) {
        $.ajax({
            method     : 'GET',
            url        : "{!! route('addresses::getCitiy') !!}",
            data       : {
                name        : 'city_id',
                label       : '{{ __('cms::base.cities.label') }}',
                placeholder : '{{ __('cms::base.cities.placeholder') }}',
                help        : null,
                country_id  : country_id
            },
            statusCode : {
                200 : function(data) {
                    $('#cities_selector').html(data);
                }
            }
        });
    }

    function getMunicipalites(city_id) {
        $.ajax({
            method     : 'GET',
            url        : "{!! route('addresses::getMunicipality') !!}",
            data       : {
                name        : 'city_id',
                label       : '{{ __('cms::base.municipalites.label') }}',
                placeholder : '{{ __('cms::base.municipalites.placeholder') }}',
                help        : null,
                city_id     : city_id,
            },
            statusCode : {
                200 : function(data) {
                    $('#municipalities_selector').html(data);
                }
            }
        });
    }
    function getNeighborhoodes(municipality_id) {
        $.ajax({
            method     : 'GET',
            url        : "{!! route('addresses::getNeighborhood') !!}",
            data       : {
                name             : 'city_id',
                label            : '{{ __('cms::base.neighborhoodes.label') }}',
                placeholder      : '{{ __('cms::base.neighborhoodes.placeholder') }}',
                help             : null,
                municipality_id  : municipality_id,
            },
            statusCode : {
                200 : function(data) {
                    $('#neighborhoodes_selector').html(data);
                }
            }
        });
    }
</script>
@endpush
