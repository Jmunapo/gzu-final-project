@extends('layouts.main')

@section('title')
    Department List
@endsection

@section('content')
<div class="page-content">
    <div class="page-bar">
      <div class="page-title-breadcrumb">
        <div class=" pull-left">
          <div class="page-title">Department List</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
          <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
              href="/">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li><a class="parent-item" href="javascript:;">Department</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li class="active">Department List</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="card-box">
          <div class="card-head">
            <header>Department List</header>
            <button id="sdntmenu" class="mdl-button mdl-js-button mdl-button--icon pull-right"
              data-upgraded=",MaterialButton">
              <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
              data-mdl-for="sdntmenu">
              <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
              </li>
              <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
              </li>
              <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                here</li>
            </ul>
          </div>
          <div class="card-body ">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-6">
                <div class="btn-group">
                  <a href="/add_department" id="addRow" class="btn btn-info">
                    Add New <i class="fa fa-plus"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-6">
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
                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="table-scrollable">
              <table
                class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                id="example4">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Dept. Name</th>
                    <th>Chairperson</th>
                    <th>Email</th>
                    <th>School</th>
                    <th>Starting Year</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Mathematics and Computer Sc.</td>
                    <td>Mr. A.Muntali</td>
                    <td><a href="mailto:amunthali@gzu.ac.zw">
                        amunthali@gzu.ac.zw</a></td>
                    <td>Agriculture And Natural Sciences</td>
                    <td>1998</td>
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
                                        <i class="icon-trash"></i> Delete</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection