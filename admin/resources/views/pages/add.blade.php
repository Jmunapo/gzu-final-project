@extends('layouts.main')

@section('title')
    Add Carriculum
@endsection

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <?php 
                    $programme_name = \App\Programme::findOrFail(request()->id)->programme_name;  
                ?>
                <div class="page-title">Carriculum for {{$programme_name}}</div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-7 col-lg-7 col-sm-12">
            <div class="card card-topline-red">
                    <div class="card-head">
                        <header>Select Course</header>
                    </div>
                    <div class="card-body ">
                        <div class="table-scrollable">
                            <table
                                class="table table-striped table-bordered table-hover table-checkable order-column"
                                id="example4">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th> Course Code </th>
                                        <th> Course Name </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr class="odd gradeX">
                                            <td>
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-{{$course->id}}">
                                                    <input type="radio" id="option-{{$course->id}}" class="mdl-radio__button" name="options"
                                                        value="{{$course->id}}">
                                                </label>
                                            </td>
                                            <td> {{ $course->course_code }} </td>
                                            <td>
                                                {{ $course->course_name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th> Course Code </th>
                                        <th> Course Name </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
    </div>

    <div class="col-md-5 col-lg-5 col-sm-12">
        <div class="card-box">
            <div class="card-head">
                <header>Add Curriculam Details</header>
            </div>
            <input type="hidden" id="route" value="{{ route('save_curriculum') }}">
            <input type="hidden" id="programme_id" value="{{ request()->id }}">
    
            <div class="card-body row">

                    <div class="col-lg-12 p-t-20">
                        <div
                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                            <input class="mdl-textfield__input" type="text" id="starts_from" value="" readonly tabIndex="-1">
                            <label for="starts_from" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="starts_from" class="mdl-textfield__label">Starts From</label>
                            <ul data-mdl-for="starts_from" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" data-val="March-2020">March 2020</li>
                                <li class="mdl-menu__item" data-val="Aug-2020">Aug 2020</li>
                            </ul>
                        </div>
                    </div>

                <?php $levels = ["1.1", "1.2", "2.1", "2.2", "3.1", "3.2", "4.1", "4.2", "5.1", "5.2"]; ?>
                
                <div class="col-lg-12 p-t-20">
                    <div
                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                        <input class="mdl-textfield__input" type="text" id="conventional_level" value="" readonly tabIndex="-1">
                        <label for="conventional_level" class="pull-right margin-0">
                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                        </label>
                        <label for="conventional_level" class="mdl-textfield__label">Level [Conventional]</label>
                        <ul data-mdl-for="conventional_level" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
        
                            @foreach ($levels as $level)
                            <li class="mdl-menu__item" data-val="{{$level}}">{{$level}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-12 p-t-20">
                    <div
                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                        <input class="mdl-textfield__input" type="text" id="block_level" value="" readonly tabIndex="-1">
                        <label for="block_level" class="pull-right margin-0">
                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                        </label>
                        <label for="block_level" class="mdl-textfield__label">Level [Block Release]</label>
                        <ul data-mdl-for="block_level" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
        
                            @foreach ($levels as $level)
                            <li class="mdl-menu__item" data-val="{{$level}}">{{$level}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                
                <div class="col-lg-12">
                <div class="checkbox checkbox-icon-black">
                        <input id="optional" name="optional" type="checkbox">
                        <label for="optional">
                            Optional Course
                        </label>
                </div>
                </div>
                                        

                <div class="col-lg-12 p-t-20 text-center">
                    <button type="button" data-toggle="modal"  data-target="#loader-modal" id="submit_curricula"
                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Add Course</button>
                    <button type="button"
                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">View Carriculam</button>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
