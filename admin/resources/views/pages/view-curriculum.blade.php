@extends('layouts.main')

@section('title')
    View Carriculum
@endsection

<?php 
    $programme_name = \App\Programme::findOrFail(request()->id)->programme_name;  
?>

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Curriculum  List</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="{{ route('programmes') }}">Programmes</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Curriculum List</li>
            </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card-box">
                <div class="card-head">
                <header>Carriculums for {{ $programme_name }}</header>
                </div>
                <div class="card-body ">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                    <div class="btn-group">
                        <button class="btn btn-info" id="add_carricula">
                            Add New Carriculum <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    </div>
                </div>
                <div class="table-scrollable">
                    <table
                    class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                    id="example4">
                    <thead>
                        <tr>
                        <th>Curriculum  Name</th>
                        <th>Effect From</th>
                        <th># of Courses</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($curriculums as $curriculum)
                        <tr>
                            <td>{{ $curriculum->curricular_name }}</td>
                            <td>{{  date('M-Y', strtotime($curriculum->effect_from))}}</td>
                            <td>
                                @php
                                    echo count(\App\CurriculumCourse::where('curricular_id', $curriculum->id)->get())
                                @endphp
                            </td> 
                            {{-- TODO: Query (by curriculum_id , $curriculum->id ) database for the number of assigned course --}}
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
                                            <a href="javascript:;" data-curr-id="{{ $curriculum->id }}">
                                                <i class="icon-eye"></i> View Courses</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('assign_courses', [request()->id.'_'.$curriculum->id]) }}">
                                                <i class="icon-link"></i> Assign Courses</a>
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
        @include('includes.add-carriculum-modal')
    </div>
@endsection
