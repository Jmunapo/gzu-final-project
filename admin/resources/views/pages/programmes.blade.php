@extends('layouts.main')

@section('title')
    GZU Programmes
@endsection

@section('content')
<div class="page-content">
    <div class="page-bar">
      <div class="page-title-breadcrumb">
        <div class=" pull-left">
          <div class="page-title">Programmes List</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
          <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
              href="javascript:;">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li class="active">Programmes</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card-box">
          <div class="card-body ">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-6">
                <div class="btn-group">
                  <a href="{{ route('add_programme_frm') }}" id="addRow" class="btn btn-info">
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
                    <th>Code</th>
                    <th>Graduate Level</th>
                    <th>Programme Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($programmes as $programme)
                    <tr>
                        <td>{{$programme->programme_code}}</td>
                        <td>{{$programme->graduate_level}}</td>
                        <td>{{$programme->programme_name}}</td>
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
                                  {{-- <li>
                                      <a href="javascript:;" data-programme-id="{{$programme->id}}">
                                            <i class="icon-eye"></i> View</a>
                                  </li> --}}
                                    
                                    {{-- <li>
                                        <a href="javascript:;"  data-programme-id="{{$programme->id}}" >
                                            <i class="icon-pencil"></i> Edit</a>
                                    </li> --}}
                                  <li>
                                    <a href="{{ route('view_curriculums', [$programme->id]) }}" data-programme-id="{{$programme->id}}">
                                          <i class="icon-book-open"></i> Curriculums</a>
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
