@extends('layouts.main')

@section('title')
  Add Department
@endsection

@section('content')
<div class="page-content">
    <div class="page-bar">
      <div class="page-title-breadcrumb">
        <div class=" pull-left">
          <div class="page-title">Add Department</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
          <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
              href="/">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li><a class="parent-item" href="javascript:;">Department</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li class="active">Add Department</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card-box">
          <div class="card-head">
            <header>Add Department</header>
          </div>
          <div class="card-body row">
            <input type="hidden" id="route_dep" value="{{ url('add_department') }}">
            <div class="col-lg-12 p-t-20">
              <div
                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input class="mdl-textfield__input" type="text" id="department_name">
                <label class="mdl-textfield__label" for="department_name">Department Name *</label>
              </div>
            </div>

              <div class="col-lg-6 p-t-20">
                <div 
                  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                  <input class="mdl-textfield__input add-new-val" type="text" id="school_id" value="" readonly tabIndex="-1">
                  <label for="school_id" class="pull-right margin-0">
                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                  </label>
                  <label for="school_id" class="mdl-textfield__label">Shool Of: *</label>
                  <ul data-mdl-for="school_id" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">

                      @foreach ($schools as $school)
                        <li class="mdl-menu__item" data-val="{{$school->id}}">{{$school->school_name}}</li>
                      @endforeach

                    <li class="divider"> </li>
                    <li class="divider add-new"> </li>
                    <li class="mdl-menu__item" id="add_new" data-val="" data-modal-target="add-school-modal">
                        <i class="icon-plus"></i> Add New Shool
                    </li>
                  </ul>
                </div>
              </div>
              
            <div class="col-lg-6 p-t-20">
              <div
                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input class="mdl-textfield__input date" type="text" id="start_date">
                <label class="mdl-textfield__label" for="start_date">Department Start Date</label>
              </div>
            </div>
            
            <div class="col-lg-12 p-t-20">
              <div class="mdl-textfield mdl-js-textfield txt-full-width">
                <textarea class="mdl-textfield__input" rows="4" id="about_department"></textarea>
                <label class="mdl-textfield__label" for="about_department">Department Details</label>
              </div>
            </div>
            <div class="col-lg-12 p-t-20 text-center">
              <button type="button" id="add_deprtmnt_submit"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
              <button type="button"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('includes.add-school-modal')
  
    @include('includes.loader-modal')
  </div>

  

@endsection