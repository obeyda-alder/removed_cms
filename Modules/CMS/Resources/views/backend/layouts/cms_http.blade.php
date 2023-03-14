<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" direction="{{ $lang_direction }}" style="direction: {{ $lang_direction }};">

<head>
    {{-- <script> console.log = function() {} </script> --}}
	@include('cms::backend.includes.meta')
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: { "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"] },
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>
	@include('cms::backend.includes.styles')
	@stack('styles')
	<link rel="shortcut icon" href="{!! asset( __('cms::app.logos.favicon') ) !!}" />

   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- alpha/css/bootstrap.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body class="">
	<div class="grid">

		@include('cms::backend.includes.header')

            <div class="container-fluid page-body-wrapper">
                @include('cms::backend.includes.main_menu')
                @include('cms::backend.includes.toaster.toaster')
                <div class="main-panel">

                    @yield('breadcrumbs')


                    <div class="main-content">
                        @yield('cms-component')
                        <div class="sub-content">
                            @yield('content')
                        </div>
                    </div>

                    <footer class="footer p-3">
                        <div class="d-flex justify-content-center">
                          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">{{ \Carbon\Carbon::now()->year }} &copy; {!! __('cms::app.footer.copyright') !!} | <a href="javascript:;">{!! __('cms::app.footer.developer') !!}</a></span>
                        </div>
                    </footer>
                </div>
            </div>
	</div>

	<div id="scroll_top" class="scroll-top">
		<i class="la la-arrow-up"></i>
	</div>

	@include('cms::backend.includes.scripts')
	@stack('before_scripts')
	@stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
</body>
</html>
