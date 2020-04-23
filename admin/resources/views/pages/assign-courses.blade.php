@extends('layouts.main')

@section('title')
    Add Carriculum
@endsection
 <?php $levels = ["1.1", "1.2", "2.1", "2.2", "3.1", "3.2", "4.1", "4.2", "5.1", "5.2"];
 
 ?>



@section('content')

<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <?php 
                    $programme_name = \App\Programme::findOrFail(request()->id)->programme_name;  
                ?>
                <div class="page-title">Assign Courses</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card card-topline-red">
                <div class="card-head">
                    <header>Department Courses</header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="btn-group">
                                <a href="{{ route('create_course') }}" id="addRow" class="btn btn-info">
                                    Add New Course <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="btn-group pull-right">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth select-width">
                                    <input onchange="levelChanged(this.value)" class="mdl-textfield__input" type="text" id="level" value="1.1"
                                        readonly tabIndex="-1">
                                    <label for="level" class="mdl-textfield__label">Select Level</label>
                                    <ul data-mdl-for="level"
                                        class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        @foreach ($levels as $level)
                                            <li class="mdl-menu__item">{{$level}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="store_curriculum_course" value="{{ route('store_curriculum_course') }}">
                        <input type="hidden" id="level_courses_route" value="{{ route('level_courses') }}">
                        <input type="hidden" id="drop_course" value="{{ route('drop_course') }}">
                        <input type="hidden" id="carriculum_id" value="{{ explode("_", request()->id)[1] }}">
                    </div>
                    <div class="table-scrollable">
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column"
                            id="example4">
                            <thead>
                                <tr>
                                    <th> Course Code </th>
                                    <th> Course Name </th>
                                    <th> Add </th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($courses as $course)
                                <tr class="odd gradeX">
                                    <td> {{ $course->course_code }} </td>
                                    <td> {{ $course->course_name }}</td>
                                    <td class="center">
                                        <a onclick="addCourse({{ $course  }})" href="javascript:void(0)" class="text-primary" data-toggle="tooltip" title="Assign {{ $course->course_code }}">
                                        <i class="icon-plus"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-4 col-sm-12">
            <div class="card-box">
                <div class="card-head">
                    <header>Level <span id="selected_level">1.1</span> courses</header>
                </div>
                <div class="card-body ">
                    <ul class="to-do-list" id="level_courses">
                    @foreach ($one_one_courses as $one)
                    @php
                        $course = \App\Course::find($one->course_id);
                    @endphp
                        <li class="clearfix">
                            <p class="todo-title">
                                {{ $course->course_code }}
                            </p>
                            <div class="todo-actionlist pull-right clearfix">
                                <a onclick="deleteCurriculumCourse({{ $one }})" href="#" data-toggle="tooltip" title="Delete" class="todo-remove"><i class="fa fa-times"></i></a>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @include('includes.loader-modal')
    </div>
@endsection
