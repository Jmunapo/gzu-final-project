@extends('layouts.main')

@section('title')
    Exam Timetable
@endsection

@if (Request::is('exam_timetable/*'))
  
<link href="{!! asset('assets/plugins/fullcalendar/fullcalendar.css') !!}" rel="stylesheet" type="text/css" />

  @php
      $venue_avai = \App\VenueTimetable::whereVenueId($venue->id)->get();
      foreach ($venue_avai as $v) {
        $course = \App\Course::find($v->course_id);
        $v->course_code = $course->course_code;
        $v->course_name = $course->course_name;
      }
  @endphp
  <script type="text/javascript">
    var venue_ttable = {!! json_encode($venue_avai) !!};
</script>
@endif

@section('content')
<div class="page-content">
  <div class="page-bar">
    <div class="page-title-breadcrumb">
      <div class=" pull-left">
        <div class="page-title">Examination Timetable</div>
      </div>
      <ol class="breadcrumb page-breadcrumb pull-right">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
            href="{{ url('home') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{ url('venues') }}">Venues</a>&nbsp;<i class="fa fa-angle-right"></i>
      </li>
        <li class="active">Examination Timetable</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card-box">
          <div class="card-head">
            <header>{{ $venue->venue_name }} Timetable</header>
          </div>
          <div class="card-body ">
            <div class="panel-body">
              <div id="calendar" class="has-toolbar"> </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection