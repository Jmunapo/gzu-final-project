<?php
$applicants = count(\App\Applicant::whereAccepted(0)->get());
?>

<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
      <div id="remove-scroll" class="left-sidemenu">
        <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true"
          data-slide-speed="200" style="padding-top: 20px">
          <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
              <span></span>
            </div>
          </li>
          <li class="sidebar-user-panel">
            <div class="user-panel">
              <div class="pull-left image">
                <img src="{!! asset('assets/img/dp.jpg') !!}" class="img-circle user-img-circle" alt="User Image" />
              </div>
              <div class="pull-left info">
                <p> {{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
                    Online</span></a>
              </div>
            </div>
          </li>
          
          <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}">
            <a href="/" class="nav-link nav-toggle">
              <i class="material-icons">dashboard</i>
              <span class="title">Dashboard</span>
            </a>
          </li>

          {{-- <li class="nav-item {{ Request::path() == 'events' ? 'active' : '' }}">
            <a href="/events" class="nav-link nav-toggle"> <i class="material-icons">event</i>
              <span class="title">Event Management</span>
            </a>
          </li> --}}
          <li class="nav-item   {{ (Request::path() == 'students' || Request::path() == 'applicants') ? 'open active' : '' }}">
            <a href="#" class="nav-link nav-toggle"><i class="material-icons">group</i>
              <span class="title">Students</span><span class="arrow {{ (Request::path() == 'students' || Request::path() == 'applicants') ? 'open' : '' }}"></span></a>
            <ul class="sub-menu">
              <li class="nav-item {{ Request::path() == 'students' ? 'active' : '' }}">
                <a href="/students" class="nav-link"> <span class="title">All
                    Students</span>
                    <span class="selected"></span>
                </a>
              </li>
              <li class="nav-item {{ Request::path() == 'applicants' ? 'active' : '' }}">
                <a href="/applicants" class="nav-link "> <span class="title">Applicants
                    </span>
                    <span class="label label-rouded label-menu label-danger" id="applicant_total">{{$applicants}}</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item  {{ (Request::path() == 'course' || Request::path() == 'course/create') ? 'open active' : '' }}">
            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">school</i>
              <span class="title">Courses</span> <span class="arrow  {{ (Request::path() == 'course' || Request::path() == 'course/create') ? 'open' : '' }}"></span>
            </a>
            <ul class="sub-menu">
              <li class="nav-item {{ Request::path() == 'course' ? 'active' : '' }}">
                <a href="/course" class="nav-link "> <span class="title">All
                    Courses</span>
                </a>
              </li>
              <li class="nav-item {{ Request::path() == 'course/create' ? 'active' : '' }}">
                <a href="/course/create" class="nav-link "> <span class="title">Add
                    Course</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (Request::path() == 'programmes' || Request::path() == 'add_programme') ? 'open active' : '' }}">
            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">school</i>
              <span class="title">Programmes</span> <span class="arrow  {{ (Request::path() == 'programmes' || Request::path() == 'add_programme') ? 'open' : '' }}"></span>
            </a>
            <ul class="sub-menu">
              <li class="nav-item  {{ Request::path() == 'programmes' ? 'active' : '' }}">
                <a href="/programmes" class="nav-link "> <span class="title">All
                    Programmes</span>
                </a>
              </li>
              <li class="nav-item  {{ Request::path() == 'add_programme' ? 'active' : '' }}">
                <a href="/add_programme" class="nav-link "> <span class="title">Add
                  Programme</span>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item  {{ (Request::path() == 'departments' || Request::path() == 'add_department') ? 'open active' : '' }}">
            <a href="javascript:;" class="nav-link nav-toggle"> <i class="material-icons">business</i>
              <span class="title">Departments</span> <span class="arrow  {{ (Request::path() == 'departments' || Request::path() == 'add_department') ? 'open' : '' }}"></span>
            </a>
            <ul class="sub-menu">
              <li class="nav-item {{ Request::path() == 'departments' ? 'active' : '' }}">
                <a href="/departments" class="nav-link "> <span class="title">All
                    Departments</span>
                </a>
              </li>
              <li class="nav-item {{ Request::path() == 'add_department' ? 'active' : '' }}">
                <a href="/add_department" class="nav-link "> <span class="title">Add
                    Department</span>
                </a>
              </li>
            </ul>
          </li>

          

          <li class="nav-item {{ Request::path() == 'venues' ? 'active' : '' }}">
            <a href="{{ route('venues') }}" class="nav-link nav-toggle"> <i class="material-icons">local_library</i>
              <span class="title">Venues</span>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </div>