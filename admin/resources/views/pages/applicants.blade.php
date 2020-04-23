@extends('layouts.main')

@section('title')
    Applicants
@endsection



@section('content')
<div class="page-content">
    <div class="page-bar">
      <div class="page-title-breadcrumb">
        <div class=" pull-left">
          <div class="page-title">Applicants</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
          <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
              href="/">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li><a class="parent-item" href="javascript:;">Students</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li class="active">Applicants List</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-box">
          <div class="card-head">
            <header>Applicants List</header>
            <input type="hidden" id="route" value="{{ route('accept_applicant') }}">
            <input type="hidden" id="reject_route" value="{{ route('reject_applicant') }}">
            <div class="tools">
              <a class="fa fa-repeat btn-color box-refresh"
                href="javascript:;"></a>
              <a class="t-collapse btn-color fa fa-chevron-down"
                href="javascript:;"></a>
              <a class="t-close btn-color fa fa-times"
                href="javascript:;"></a>
            </div>
          </div>
          <div class="card-body ">
            <div class="table-scrollable">
              <table
                class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                id="allStudents">
                <thead>
                  <tr>
                    <th> Name </th>
                    <th> 1st Choice </th>
                    <th> 2nd Choice </th>
                    <th> 3rd Choice </th>
                    <th> 'O' Level</th>
                    <th> 'A' Level</th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($applicants as $applicant)
                 
                    <tr class="odd gradeX">
                      <td style="text-transform:capitalize;" id="{{$applicant->id}}_name">
                          {{$applicant->firstname}} {{$applicant->lastname}}
                      </td>
                      <td class="left" id="{{$applicant->id}}_first">{{$applicant->first_choice_programme}}</td>
                      <td class="left" id="{{$applicant->id}}_second">{{$applicant->second_choice_programme}}</td>
                      <td class="left" id="{{$applicant->id}}_third">{{$applicant->third_choice_programme}}</td>
                      <td class="center">{{ count(explode('|',$applicant->o_level_subjects)) }}</td>
                      <td class="center">{{ count(explode('|',$applicant->a_level_subjects)) }}</td>
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
                                      <a href="/view_applicant">
                                          <i class="icon-eye"></i> View</a>
                                  </li>
                                  <li>
                                    <a href="javascript:;" data-user-id="{{$applicant->id}}" id="joe" class="text-success accept-applicant">
                                          <i class="icon-check text-success"></i> Accept</a>
                                  </li>
                                  <li>
                                      <a href="javascript:;"  data-reject-id="{{$applicant->id}}"  class="text-danger reject_applicant">
                                          <i class="icon-close text-danger"></i> Reject</a>
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
      @include('includes.accept-modal')
    </div>

    

  </div>
@endsection
