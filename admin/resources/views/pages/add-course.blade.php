@extends('layouts.main')

@section('title')
    Add Course
@endsection

@section('content')
<div class="page-content">
    <div class="page-bar">
      <div class="page-title-breadcrumb">
        <div class=" pull-left">
          <div class="page-title">Add Course</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
          <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/">Dashboard</a>&nbsp;<i
              class="fa fa-angle-right"></i>
          </li>
          <li><a class="parent-item" href="javascript:;">Courses</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li class="active">Add Course</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <div class="card-box">
          <div class="card-head">
            <header>Course Details</header>
          </div>
          <input type="hidden" id="route" value="{{ url('course') }}">

          <div class="card-body row">

            <div class="col-lg-6 p-t-20">
              <div
                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                <input class="mdl-textfield__input add-new-val" type="text" id="department_id" value="" readonly tabIndex="-1">
                <label for="department_id" class="pull-right margin-0">
                  <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                </label>
                <label for="department_id" class="mdl-textfield__label">* Department</label>
                <ul data-mdl-for="department_id" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                  
                  @foreach ($departments as $department)
                      <li class="mdl-menu__item" data-val="{{$department->id}}">{{$department->department_name}}</li>
                  @endforeach

                  <li class="divider"> </li>
                  <li class="divider add-new"> </li>
                  <li class="mdl-menu__item" id="add_department_from_prog" data-val="{{ route('add_department') }}">
                      <i class="icon-plus"></i> Add New Department
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-lg-6 p-t-20">
                <div
                  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                  <input class="mdl-textfield__input add-new-val" type="text" id="university_wide" value="" readonly tabIndex="-1">
                  <label for="university_wide" class="pull-right margin-0">
                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                  </label>
                  <label for="university_wide" class="mdl-textfield__label">* University wide module?</label>
                  <ul data-mdl-for="university_wide" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                    <li class="mdl-menu__item" data-val="no">No</li>
                    <li class="mdl-menu__item" data-val="yes">Yes</li>
                  </ul>
                </div>
              </div>

            
            <div class="col-lg-6 p-t-20">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input class="mdl-textfield__input" type="text" id="course_name">
                <label class="mdl-textfield__label">* Course Name</label>
              </div>
            </div>
            <div class="col-lg-6 p-t-20">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input class="mdl-textfield__input" type="text" id="course_code">
                <label class="mdl-textfield__label">* Course Code</label>
              </div>
            </div>
            <div class="col-lg-12 p-t-20">
              <div class="mdl-textfield mdl-js-textfield txt-full-width">
                <textarea class="mdl-textfield__input" rows="4" id="course_description"></textarea>
                <label class="mdl-textfield__label" for="txtCourseDescription">* Course Description</label>
              </div>
            </div>
            <div class="col-lg-12 p-t-20 text-center">
              <button type="button" data-toggle="modal"  data-target="#loader-modal" id="submit_course"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
              <button type="button"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
            </div>
          </div>
        </div>
      </div>

      {{-- <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="card-box">
            <div class="card-head">
            <header>Add From CSV</header> &nbsp;
            <button type="button" class="mdl-chip" id="csv_template">
                    <span class="mdl-chip__text">Download Template</span>
            </button>
            </div>
            <div class="card-body row">
                <div class="col-lg-12 p-t-20">
                    <label class="control-label">Courses CSV File
                    </label>
                    <form  method="post" action="{{url('course')}}" id="upload_csv" class="dropzone col-md-12" enctype="multipart/form-data">
                        <div class="dz-message">
                            <div class="col-xs-8">
                                <div class="message">
                                    <p>Drop CSV file here or Click to Upload</p>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        </div> --}}
    </div>

    @include('includes.loader-modal')

  </div>
@endsection
