  <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Great Zimbabwe University Admin" />
	<meta name="author" content="joemags" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="{!! asset('assets/fonts/simple-line-icons/simple-line-icons.min.css') !!}" rel="stylesheet" type="text/css" />
	<link href="{!! asset('assets/fonts/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />
	<link href="{!! asset('assets/fonts/material-design-icons/material-icon.css') !!}" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="{!! asset('assets/plugins/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
	<link href="{!! asset('assets/plugins/summernote/summernote.css') !!}" rel="stylesheet">
		<!-- data tables -->
		<link href="{!! asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') !!}" rel="stylesheet"
		type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="{!! asset('assets/plugins/material/material.min.css') !!}">
	<link rel="stylesheet" href="{!! asset('assets/css/material_style.css') !!}">
	<!-- inbox style -->
	<link href="{!! asset('assets/css/pages/inbox.min.css') !!}" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->
	<link href="{!! asset('assets/css/theme/dark/theme_style.css') !!}" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="{!! asset('assets/css/plugins.min.css') !!}" rel="stylesheet" type="text/css" />
	<link href="{!! asset('assets/css/theme/dark/style.css') !!}" rel="stylesheet" type="text/css" />
	<link href="{!! asset('assets/css/responsive.css') !!}" rel="stylesheet" type="text/css" />
	<link href="{!! asset('assets/css/theme/dark/theme-color.css') !!}" rel="stylesheet" type="text/css" />
	
	{{-- Logic to add this when datepicker css needed --}}
	<!-- dropzone -->
	<link href="{!! asset('assets/plugins/dropzone/dropzone.css') !!}" rel="stylesheet" media="screen">
	<!-- steps -->
	<link rel="stylesheet" href="{!! asset('assets/plugins/steps/steps.css') !!}">
	<!-- Date Time item CSS -->
	<link rel="stylesheet" href="{!! asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css') !!}" />
	
	<link rel="stylesheet" href="{!! asset('css/gzu.masteradmin.css') !!}">
	<!-- favicon -->
	<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}"/>

	@auth
    <script src="{{ asset('js/enable-push.js') }}" defer></script>
	@endauth


	{{-- Page logic --}}
	@if (Request::is('exam_timetable/*'))
	<link href="{!! asset('assets/plugins/select2/css/select2.css') !!}" rel="stylesheet" type="text/css" />
  <link href="{!! asset('assets/plugins/select2/css/select2-bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
	<link href="{!! asset('assets/plugins/bootstrap-datepicker/datepicker.css') !!}" rel="stylesheet">
	<link href="{!! asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') !!}" rel="stylesheet"
			media="screen">
	@endif