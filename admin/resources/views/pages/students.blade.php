@extends('layouts.main')

@section('title')
    Students
@endsection

@section('content')
<div class="page-content">
    <div class="page-bar">
      <div class="page-title-breadcrumb">
        <div class=" pull-left">
          <div class="page-title">All Students</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
          <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
              href="/">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li><a class="parent-item" href="javascript:;">Students</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li class="active">All Students</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-box">
          <div class="card-head">
            <header>Students List</header>
          </div>
          <div class="card-body ">
            <div class="row">
              {{-- <div class="col-md-6 col-sm-6 col-6">
                <div class="btn-group">
                  <a href="/add_student" id="addRow"
                    class="btn btn-info">
                    Add New Student<i class="fa fa-plus"></i>
                  </a>
                </div>
              </div> --}}
              <div class="col-md-12 col-sm-12 col-12">
                <div class="btn-group pull-right">
                  <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle"
                    data-toggle="dropdown">Tools
                    <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                    <li>
                      <a href="javascript:;">
                        <i class="fa fa-print"></i> Print </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <i class="fa fa-file-pdf-o"></i> Save as
                        PDF </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <i class="fa fa-file-excel-o"></i>
                        Export to Excel </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="table-scrollable">
              <table
                class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                id="allStudents">
                <thead>
                  <tr>
                    <th> REG No </th>
                    <th> Name </th>
                    <th> Programme </th>
                    <th> Mobile </th>
                    <th> Intake </th>
                    <th> Intake Type </th>
                    <th> Fees </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students as $student)
                  
                    <tr class="odd gradeX">
                      <td class="left">{{$student->reg_number}}</td>
                      <td>{{$student->name}}</td>
                      <td class="left">
                        <?php
                          $programme = \App\Programme::findOrFail($student->programme_id)->programme_name;
                        ?>
                        {{$programme}}
                      </td>
                      <td><a href="tel:{{$student->phone}}">{{$student->phone}} </a></td>
                      <td>{{ date('M-Y',strtotime($student->enrolled_at)) }}</td>
                      <td class="left">{{$student->intake_type}}</td>
                      <td>
                          <span class="label label-sm label-success">50%</span>
                      </td>
                      <td class="valigntop">
                          <div class="btn-group">
                              <button
                                  class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin"
                                  type="button" data-toggle="dropdown"
                                  aria-expanded="false">
                                  Actions
                                  <i class="fa fa-angle-down"></i>
                              </button>
                              <ul class="dropdown-menu pull-left" role="menu">
                                  <li>
                                      <a href="javascript:;">
                                          <i class="icon-eye"></i> View</a>
                                  </li>
                                  <li>
                                      <a href="javascript:;">
                                          <i class="icon-chart"></i> Finance</a>
                                  </li>
                              </ul>
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
