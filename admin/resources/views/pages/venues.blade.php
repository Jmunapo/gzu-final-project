@extends('layouts.main')

@section('title')
    Venues
@endsection

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Venue List</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                        href="/">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Venue List</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card-box">
                <div class="card-head">
                    <header>Venue List</header>
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
                    <div class="row table-padding">
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="btn-group">
                                <a href="javascript:;" id="addVenue"
                                    class="btn btn-info">
                                    Add New Venue <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="btn-group pull-right">
                                <a href="javascript:;" id="generateTTable"
                                    class="btn btn-success">
                                    Generate Timetable <i class="fa fa-calendar"></i>
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
                                    <th>Venue Name </th>
                                    <th> Venue Key </th>
                                    <th> Capacity </th>
                                    <th> Timetable </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($venues as $venue)
                                <tr class="odd gradeX">
                                    <td>{{ $venue->venue_name }}</td>
                                    <td class="left">{{ $venue->venue_key }}</td>
                                    <td class="left">{{ $venue->capacity }}</td>
                                    <td class="left">
                                        @php
                                            $venue_avai = \App\VenueTimetable::whereVenueId($venue->id)->first();
                                            if(isset($venue_avai)){
                                                echo 'Generated';
                                            }else{
                                                echo 'Not Available';
                                            }
                                        @endphp

                                    </td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <button
                                                class="btn btn-xs btn-warning dropdown-toggle center no-margin"
                                                type="button" data-toggle="dropdown"
                                                aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                @if (isset($venue_avai))
                                                    <li>
                                                        <a href="{{ url('exam_timetable', [$venue->id]) }}"><i class="fa fa-trash-o"></i>
                                                            Exam Timetable</a>
                                                    </li>
                                                @endif
                                                
                                                {{-- <li>
                                                    <a href="javascript:;" data-vid="{{ $venue->id }}"><i class="fa fa-ban"></i>
                                                        Edit Venue </a>
                                                </li> --}}
                                                <li>
                                                    <a href="javascript:;" data-vid="{{ $venue->id }}"><i class="fa fa-trash-o"></i>
                                                        Delete Venue</a>
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

    @include('includes.add-venue-modal')

    @include('includes.generate-ttable-modal')
  
    @include('includes.loader-modal')
</div>
@endsection
