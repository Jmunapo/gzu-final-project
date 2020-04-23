<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
  
  <title>
    @yield('title', 'GZU ADMIN')
  </title>

</head>
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-dark dark-sidebar-color logo-dark dark-theme">
    {{-- page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo --}}
  <div class="page-wrapper">

      @include('layouts.partials.header')

      {{-- @include('layouts.partials.quick-setting') --}}

      <div class="page-container">
        
        @include('layouts.partials.sidebar')

        <div class="page-content-wrapper">
            @yield('content')
        </div>

        @include('layouts.partials.chat-sidebar')

        
      </div>


      

    </div>

  @include('layouts.partials.footer')
  
</body>

<script>
  var GZU = {
    appName: 'Great Zimbabwe University Admin Panel',
  };
</script>

@include('layouts.partials.scripts')

<script src="{!! asset('assets/plugins/sweetalert/sweetalert2.js') !!}"></script>

@if (Request::path() === "applicants")
  <script src="{!! asset('js/pages/applicant.js') !!}"></script>
@endif

@if (Request::path() === "add_programme")
  <script src="{!! asset('js/pages/add-programme.js') !!}"></script>
@endif

@if (Request::path() === "course/create")
  <script src="{!! asset('assets/plugins/dropzone/dropzone.js') !!}"></script> 
  <script src="{!! asset('assets/plugins/dropzone/dropzone-call.js') !!}"></script> 
  <script src="{!! asset('js/pages/gzu.dropzone.js') !!}"></script>
@endif


@if (Request::is('programmes/view_curriculums/*'))
  <script src="{!! asset('js/pages/curriculam.js') !!}"></script>
@endif


@if (Request::is('programmes/assign-courses/*'))
  <script src="{!! asset('js/pages/assign-courses.js') !!}"></script>
@endif

@if (Request::is('exam_timetable/*'))
  {{-- <script src="{!! asset('assets/plugins/jquery-ui/jquery-ui.min.js') !!}"></script> --}}
  <script src="{!! asset('assets/plugins/moment/moment.min.js') !!}"></script>
	<script src="{!! asset('assets/plugins/fullcalendar/fullcalendar.min.js') !!}"></script>
  <script src="{!! asset('js/pages/exam_timetable.js') !!}"></script>
  <script src="{!! asset('assets/plugins/select2/js/select2.js') !!}"></script>
  <script src="{!! asset('assets/js/pages/select2/select2-init.js') !!}"></script>
@endif

@if (Request::is('add_department'))
  <script src="{!! asset('js/pages/add-department.js') !!}"></script>
@endif

@if (Request::is('venues'))
  <script src="{!! asset('js/pages/add-venue.js') !!}"></script>
@endif

@if (Request::is('/'))
  <script src="{!! asset('js/pages/post_news.js') !!}"></script>
@endif


</html>