@extends('layouts.main')

@section('title')
    All Courses
@endsection

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Courses List</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                href="/">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="javascript:;">Courses</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Courses List</li>
        </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card-box">
            <div class="card-head">
            <header>Courses List</header>
            </div>
            <div class="card-body ">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6">
                <div class="btn-group">
                    <a href="/course/create" id="addRow" class="btn btn-info">
                    Add New <i class="fa fa-plus"></i>
                    </a>
                </div>
                </div>
            </div>
            <div class="table-scrollable">
                <table
                class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                id="example4">
                <thead>
                    <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Course Description</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{$course->course_code}}</td>
                        <td>{{$course->course_name}}</td>
                        <td>{{$course->course_description}}</td>
                        <td class="valigntop">
                            <div class="btn-group">
                                <button
                                    class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin"
                                    type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    More
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left" role="menu">
                                    <li>
                                        <a href="javascript:;" data-course-id="{{$course->id}}">
                                            <i class="icon-eye"></i> View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" data-course-id="{{$course->id}}">
                                            <i class="icon-trash"></i> Delete</a>
                                    </li>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection
