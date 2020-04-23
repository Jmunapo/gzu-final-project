@extends('layouts.main')

@section('title')
    Applicant
@endsection

@section('content')
<div class="page-content">
  <div class="page-bar">
    <div class="page-title-breadcrumb">
      <div class=" pull-left">
        <div class="page-title">Applicant Profile</div>
      </div>
      <ol class="breadcrumb page-breadcrumb pull-right">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i
            class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="#">Student</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Applicant Profile</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <!-- BEGIN PROFILE CONTENT -->
      <div class="profile-content">
        <div class="row">
          <div class="card">
            <div class="card-topline-aqua">
              <header></header>
            </div>

            <div class="white-box mt-0">
              <h4 class="ml-3">Application Fee: <span class="label label-sm label-success">PAID</span></h4>

              <!-- Nav tabs -->
              <div class="p-rl-20">
                <ul class="nav customtab nav-tabs" role="tablist">
                  <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">Personal</a></li>
                  <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">Contact</a></li>
                  <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">Programmes</a></li>
                  <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">Academic History</a></li>
                  <li class="nav-item"><a href="#tab5" class="nav-link" data-toggle="tab">Employment History</a></li>
                  <li class="nav-item"><a href="#tab6" class="nav-link" data-toggle="tab">Refrees</a></li>
                  <li class="nav-item"><a href="#tab7" class="nav-link" data-toggle="tab">Documents</a></li>
                </ul>
              </div>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                  <div id="biography">
                    <div class="row">
                      <div class="col-md-3 col-6 b-r"> <strong>Full Name</strong>
                        <br>
                        <p class="text-muted">Sarah Smith</p>
                      </div>
                      <div class="col-md-3 col-6 b-r"> <strong>Date of Birth</strong>
                        <br>
                        <p class="text-muted">19-01-1998</p>
                      </div>
                      <div class="col-md-3 col-6 b-r"> <strong>Sex</strong>
                        <br>
                        <p class="text-muted">Male</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>Place of Birth</strong>
                        <br>
                        <p class="text-muted">Chimanimani</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>Sex</strong>
                        <br>
                        <p class="text-muted">Male</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>Title</strong>
                        <br>
                        <p class="text-muted">Mr.</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>Marital Status</strong>
                        <br>
                        <p class="text-muted">Single</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>Previous Surname</strong>
                        <br>
                        <p class="text-muted">None</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>National I.D</strong>
                        <br>
                        <p class="text-muted">12-2345678 X 09</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>Race</strong>
                        <br>
                        <p class="text-muted">Black</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>Nationality</strong>
                        <br>
                        <p class="text-muted">Zimbabwean</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>Citizenship</strong>
                        <br>
                        <p class="text-muted">Zimbabwean</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>Province</strong>
                        <br>
                        <p class="text-muted">Manicaland</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>Religion</strong>
                        <br>
                        <p class="text-muted">Chritianity</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>Physical Disability</strong>
                        <br>
                        <p class="text-muted">None</p>
                      </div>
                      <div class="col-md-3 col-6"> <strong>War Veteran</strong>
                        <br>
                        <p class="text-muted">No</p>
                      </div>
                    </div>
                    <hr>
                    <br>
                  </div>
                </div>
                <div class="tab-pane" id="tab2">
                  <div class="full-width">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="card">
                          <div class="card-head card-topline-aqua">
                            <h4 class="pl-3">Physical Address</h4>
                          </div>
                          <div class="card-body no-padding height-9">
                            <div class="row text-center m-t-10">
                              <div class="col-md-12">
                                <p>216 Chikanga Phase 1, Mutare
                                  <br> Zimbabwe.</p>
                              </div>
                            </div>
                            <ul class="list-group list-group-unbordered">
                              <li class="list-group-item">
                                <b>Cell </b>
                                <div class="pull-right">
                                  <a href="tel:+263701234567">+263701234567 </a>
                                </div>
                              </li>
                              <li class="list-group-item">
                                <b>Email </b>
                                <div class=" pull-right">
                                  <a href="mailto:joe@joemags.co.zw">joe@joemags.co.zw </a>
                                </div>
                              </li>
                            </ul>
                            <br>
                            <br>
                            <br>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="card">
                          <div class="card-head card-topline-aqua">
                            <h4 class="pl-3">Next of Kin's Physical Address</h4>
                          </div>
                          <div class="card-body no-padding height-9">
                            <div class="row text-center m-t-10">
                              <div class="col-md-12">
                                <p>216 Chikanga Phase 1, Mutare
                                  <br> Zimbabwe.</p>
                              </div>
                            </div>
                            <ul class="list-group list-group-unbordered">
                              <li class="list-group-item">
                                <b>Next of Kin's Name </b>
                                <div class="pull-right">
                                  E. Chimuti
                                </div>
                              </li>
                              <li class="list-group-item">
                                <b>Relationship </b>
                                <div class="pull-right">
                                  Mother
                                </div>
                              </li>
                              <li class="list-group-item">
                                <b>Cell </b>
                                <div class="pull-right">
                                  <a href="tel:+263701234567">+263711234567 </a>
                                </div>
                              </li>
                            </ul>
                            <br>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="tab3">
                  <div id="biography">
                    <div class="row">
                      <div class="col-md-4 col-6 b-r"> <strong>Entry Type</strong>
                        <br>
                        <p class="text-muted">Normal</p>
                      </div>
                      <div class="col-md-4 col-6 b-r"> <strong>Intake Type</strong>
                        <br>
                        <p class="text-muted">Full Time</p>
                      </div>
                      <div class="col-md-4 col-6 b-r"> <strong>Sponsorship</strong>
                        <br>
                        <p class="text-muted">Self</p>
                      </div>
                    </div>
                  </div>
                  <br>
                  <hr>

                  <h4>Programmes</h4>
                  <div class="row">
                    <div class="col-md-4 col-12">
                      <div class="card">
                        <div class="card-head card-topline-green">
                          <h4 class="pl-2">First Choice</h4>
                        </div>
                        <div class="card-body no-padding height-9">
                          Bsc Hons Computer Science
                        </div>
                        <br>
                      </div>
                    </div>
                    <div class="col-md-4 col-12">
                      <div class="card">
                        <div class="card-head card-topline-purple">
                          <h4 class="pl-2">Second Choice</h4>
                        </div>
                        <div class="card-body no-padding height-9">
                          BSc Statistics and Operations Research
                        </div>
                        <br>
                      </div>
                    </div>
                    <div class="col-md-4 col-12">
                      <div class="card">
                        <div class="card-head card-topline-aqua">
                          <h4 class="pl-2">Third Choice</h4>
                        </div>
                        <div class="card-body no-padding height-9">
                          BSc Geography and Environmental Science
                        </div>
                        <br>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="tab4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box">
                        <div class="card-head">
                          <h4 class="pl-3">Academic</h4>
                        </div>
                        <div class="card-body ">
                          <div class="mdl-tabs mdl-js-tabs">
                            <div class="mdl-tabs__tab-bar tab-left-side">
                              <a href="#tab4-panel" class="mdl-tabs__tab tabs_three is-active">Ordinary Level</a>
                              <a href="#tab5-panel" class="mdl-tabs__tab tabs_three">Advanced Level</a>
                              <a href="#tab6-panel" class="mdl-tabs__tab tabs_three">University / College</a>
                            </div>
                            <div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
                              <div class="table-responsive">
                                <table class="table">
                                  <tbody>
                                    <tr>
                                      <th>Academic Year</th>
                                      <th>Exam Board</th>
                                      <th>Subject</th>
                                      <th>Grade</th>
                                    </tr>
                                    <tr>
                                      <td class="sorting_1"> Aug 2012 </td>
                                      <td>ZIMSEC</td>
                                      <td>Mathamatics</td>
                                      <td>A</td>
                                    </tr>
                                    <tr>
                                      <td class="sorting_1"> Aug 2012 </td>
                                      <td>ZIMSEC</td>
                                      <td>English</td>
                                      <td>A</td>
                                    </tr>
                                    <tr>
                                      <td class="sorting_1"> Aug 2012 </td>
                                      <td>ZIMSEC</td>
                                      <td>Geography</td>
                                      <td>A</td>
                                    </tr>
                                    <tr>
                                      <td class="sorting_1"> Aug 2012 </td>
                                      <td>ZIMSEC</td>
                                      <td>Intergrated Science</td>
                                      <td>B</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="mdl-tabs__panel p-t-20" id="tab5-panel">
                              <div class="table-responsive">
                                <table class="table">
                                  <tbody>
                                    <tr>
                                      <th>Academic Year</th>
                                      <th>Exam Board</th>
                                      <th>Subject</th>
                                      <th>Grade</th>
                                    </tr>
                                    <tr>
                                      <td class="sorting_1"> Aug 2014 </td>
                                      <td>ZIMSEC</td>
                                      <td>Physics</td>
                                      <td>A</td>
                                    </tr>
                                    <tr>
                                      <td class="sorting_1"> Aug 2014 </td>
                                      <td>ZIMSEC</td>
                                      <td>Mathematics</td>
                                      <td>B</td>
                                    </tr>
                                    <tr>
                                      <td class="sorting_1"> Aug 2014 </td>
                                      <td>ZIMSEC</td>
                                      <td>Biology</td>
                                      <td>A</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="mdl-tabs__panel p-t-20" id="tab6-panel">
                              <div class="table-responsive">
                                <table class="table">
                                  <tbody>
                                    <tr>
                                      <th>Date of Award</th>
                                      <th>Programme Name</th>
                                      <th>University / College Name</th>
                                      <th>Class / Grade</th>
                                    </tr>
                                    <tr>
                                      <td>No Record</td>
                                      <td>No Record</td>
                                      <td>No Record</td>
                                      <td>No Record</td>

                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="tab5">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box">
                        <div class="card-head">
                          <h4>Employment History</h4>
                        </div>
                        <div class="card-body ">
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th>Organisation</th>
                                  <th>Occupation</th>
                                  <th>Job Description</th>
                                  <th>From Date</th>
                                  <th>To Date</th>
                                  <th>Website</th>
                                </tr>
                                <tr>
                                  <td>Diamond Developers</td>
                                  <td>Software Developer</td>
                                  <td>Debugging Softwares</td>
                                  <td>Aug 2017</td>
                                  <td>Current</td>
                                  <td>
                                    <a href="https://diamond.co.zw">diamond.co.zw</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Cairns Foods</td>
                                  <td>General Worker</td>
                                  <td>Cleaning Cans</td>
                                  <td>Aug 2015</td>
                                  <td>Sept 2015</td>
                                  <td>
                                    <a href="https://cairns.co.zw">cairns.co.zw</a>
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

                <div class="tab-pane" id="tab6">
                  <div class="full-width">
                    <div class="row ">
                      <div class="col-md-6 col-12">
                        <div class="card">
                          <div class="card-head">
                            <h5 class="pl-3">Refree 1</h5>
                          </div>
                          <br>
                          <div class="card-body no-padding height-9">

                            <ul class="list-group list-group-unbordered">
                              <li class="list-group-item">
                                <b>Name </b>
                                <div class="pull-right">
                                  John Doe
                                </div>
                              </li>
                              <li class="list-group-item">
                                <b>Cell / Tel </b>
                                <div class="pull-right">
                                  <a href="tel:+263701234567">+263701234567 </a>
                                </div>
                              </li>
                            </ul>
                          </div>
                          <h4 class="pl-4"><strong>Address</strong></h4>
                          <div class="row text-center m-t-10">
                            <div class="col-md-12">
                              <p>216 Chikanga Phase 1, Mutare
                                <br> Zimbabwe.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="card">
                          <div class="card-head">
                            <h5 class="pl-3">Refree 2</h5>
                          </div>
                          <br>
                          <div class="card-body no-padding height-9">

                            <ul class="list-group list-group-unbordered">
                              <li class="list-group-item">
                                <b>Name </b>
                                <div class="pull-right">
                                  John Doe
                                </div>
                              </li>
                              <li class="list-group-item">
                                <b>Cell / Tel </b>
                                <div class="pull-right">
                                  <a href="tel:+263701234567">+263701234567 </a>
                                </div>
                              </li>
                            </ul>
                          </div>
                          <h4 class="pl-4"><strong>Address</strong></h4>
                          <div class="row text-center m-t-10">
                            <div class="col-md-12">
                              <p>216 Chikanga Phase 1, Mutare
                                <br> Zimbabwe.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="tab7">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box">
                        <div class="card-head">
                          <h4>Attached Documents</h4>
                        </div>
                        <div class="card-body ">
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th>#</th>
                                  <th>Document Type</th>
                                  <th>Format</th>
                                  <th>Size</th>
                                  <th>Actions</th>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>National ID</td>
                                  <td>Image</td>
                                  <td>1.5 MB</td>
                                  <td class="valigntop">
                                    <div class="btn-group">
                                      <button class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin"
                                        type="button" data-toggle="dropdown" aria-expanded="false">
                                        Actions
                                        <i class="fa fa-angle-down"></i>
                                      </button>
                                      <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                          <a href="javascript:;">
                                            <i class="icon-eye"></i> Open</a>
                                        </li>
                                        <li>
                                          <a href="javascript:;">
                                            <i class="fa fa-download"></i> Download</a>
                                        </li>
                                      </ul>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>Birth Certificate</td>
                                  <td>PDF</td>
                                  <td>50 KB</td>
                                  <td class="valigntop">
                                    <div class="btn-group">
                                      <button class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin"
                                        type="button" data-toggle="dropdown" aria-expanded="false">
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
                                            <i class="fa fa-download"></i> Download</a>
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
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END PROFILE CONTENT -->
    </div>
  </div>
</div>
@endsection
