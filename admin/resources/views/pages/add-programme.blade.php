@extends('layouts.main')

@section('title')
    Add Programme
@endsection

@section('content')
<div class="page-content">
  <div class="page-bar">
    <div class="page-title-breadcrumb">
      <div class=" pull-left">
        <div class="page-title">Add Programme</div>
      </div>
      <ol class="breadcrumb page-breadcrumb pull-right">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
            href="/">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="javascript:;">Programme</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Add Programme</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box">
        <div class="card-head">
          <header>Add Programme</header>
        </div>
        <div class="card-body row">

          <input type="hidden" id="route" name="csrf" value="{{ route('add_programme') }}">

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
                  <input class="mdl-textfield__input" type="text" id="graduate_level" value="" readonly tabIndex="-1">
                  <label for="graduate_level" class="pull-right margin-0">
                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                  </label>
                  <label for="graduate_level" class="mdl-textfield__label">* Graduate Level</label>
                  <ul data-mdl-for="graduate_level" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                    <li class="mdl-menu__item" data-val="UNDERGRADUATE">UNDERGRADUATE</li>
                    <li class="mdl-menu__item" data-val="POSTGRADUATE">POSTGRADUATE</li>
                  </ul>
                </div>
              </div>


          <div class="col-lg-12 p-t-20">
            <div
              class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
              <input class="mdl-textfield__input" type="text" id="programme_name">
              <label class="mdl-textfield__label">* Programme Name e.g BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [MATHEMATICS]</label>
              {{-- <span class="help-block has-warning">Enclose programme in "[" and "]" brackets</span> --}}
            </div>
          </div>

          <div class="col-lg-6 p-t-20">
              <div
                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input class="mdl-textfield__input" min="0" step="any" type="number" id="fees_new">
                <label class="mdl-textfield__label" for="fees_new">* New students fees</label>
              </div>
            </div>
  
            <div class="col-lg-6 p-t-20">
              <div
                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input class="mdl-textfield__input" min="0" step="any" type="number" id="fees_returning">
                <label class="mdl-textfield__label" for="fees_returning">* Returning Students fees</label>
              </div>
            </div>

          <div class="col-lg-6 p-t-20">
            <div
              class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
              <input class="mdl-textfield__input" type="text" id="conventional_duration">
              <label class="mdl-textfield__label">Duration (Conventional) e.g 2 years 6 months</label>
            </div>
          </div>

          <div class="col-lg-6 p-t-20">
            <div
              class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
              <input class="mdl-textfield__input" type="text" id="block_duration">
              <label class="mdl-textfield__label">Duration (Block Release) e.g 2 years 6 months</label>
            </div>
          </div>
          
          <div class="col-lg-12 p-t-20">
            <div class="mdl-textfield mdl-js-textfield txt-full-width">
              <textarea class="mdl-textfield__input" rows="4" id="normal_entry_requirements"></textarea>
              <label class="mdl-textfield__label" for="normal_entry_requirements">Normal Entry Requirements (each requirement per line) - OPTIONAL</label>
            </div>
          </div>

          <div class="col-lg-12 p-t-20">
            <div class="mdl-textfield mdl-js-textfield txt-full-width">
              <textarea class="mdl-textfield__input" rows="4" id="special_entry_requirements"></textarea>
              <label class="mdl-textfield__label" for="special_entry_requirements">Special Entry Requirements (each requirement per line) - OPTIONAL</label>
            </div>
          </div>

          <div class="col-lg-12 p-t-20">
            <div class="mdl-textfield mdl-js-textfield txt-full-width">
              <textarea class="mdl-textfield__input" rows="4" id="mature_entry_requirements"></textarea>
              <label class="mdl-textfield__label" for="mature_entry_requirements">Mature Entry Requirements (each requirement per line) - OPTIONAL</label>
            </div>
          </div>

          <div class="col-lg-12 p-t-20">
            <div class="mdl-textfield mdl-js-textfield txt-full-width">
              <textarea class="mdl-textfield__input" rows="4" id="notes"></textarea>
              <label class="mdl-textfield__label" for="notes">Notes (each note per line) - OPTIONAL</label>
            </div>
          </div>
          <div class="col-lg-12 p-t-20 text-center">
            <button type="button" data-toggle="modal" id="add_programme_submit" data-target="#loader-modal"
              class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
            <button type="button"
              class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('includes.loader-modal')
</div>

@endsection
