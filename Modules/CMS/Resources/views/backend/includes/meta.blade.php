<meta charset="utf-8" />
<title>{{ __('cms::base.title_p') }}{{ isset( $meta_title ) ? ' | ' . $meta_title : '' }}</title>
<meta name="title" content="{{ __('cms::app.cms_meta.title') }}{{ isset( $meta_title ) ? ' | ' . $meta_title : '' }}">
<meta name="description" content="{{ isset( $meta_description ) ? $meta_description : __('cms::app.cms_meta.description') }}">
<meta name="keywords" content="{{ isset( $meta_keywords ) ? $meta_keywords : __('cms::app.cms_meta.keywords') }}" />
<meta name="copyright" content="{{ __('cms::app.cms_meta.copyright') }}" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
