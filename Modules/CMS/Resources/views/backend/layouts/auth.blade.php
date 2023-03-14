<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" direction="{{ $lang_direction }}" style="direction: {{ $lang_direction }};">
	<head>
        @include('cms::backend.includes.styles')
        <style>
            .bg-img{
                background-image: url("{{ \Module::asset('cms:images/auth/login_4.jpg') }}");
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
	</head>

	<body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth bg-img">
                    <div class="row flex-grow">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('cms::backend.includes.scripts')
	</body>
</html>
