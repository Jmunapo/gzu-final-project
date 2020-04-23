@extends('layouts.main')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="page-content">
    <div class="page-bar">
      <div class="page-title-breadcrumb">
        <div class=" pull-left">
          <div class="page-title">Dashboard</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
          <li class="active"><i class="fa fa-home"></i>Dashboard</li>
        </ol>
      </div>
    </div>
    <!-- start widget -->
    <div class="state-overview">
      <div class="row">
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-green">
            <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Students</span>
              <span class="info-box-number">17 000</span>
              <div class="progress">
                <div class="progress-bar" style="width: 33%"></div>
              </div>
              <span class="progress-description">
                33% Increase from last year
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-yellow">
            <span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
            <div class="info-box-content">
              <span class="info-box-text">New Students</span>
              <span class="info-box-number">2 500</span>
              <div class="progress">
                <div class="progress-bar" style="width: 25%"></div>
              </div>
              <span class="progress-description">
                25% Increase from last enrollment
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-blue">
            <span class="info-box-icon push-bottom"><i class="material-icons">school</i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Course</span>
              <span class="info-box-number">52</span>
              <div class="progress">
                <div class="progress-bar" style="width: 85%"></div>
              </div>
              <span class="progress-description">
                85% Increase in 28 Days
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-pink">
            <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
            <div class="info-box-content">
              <span class="info-box-text">Fees Collection</span>
              <span class="info-box-number">13,921</span><span>$</span>
              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                50% Increase in 28 Days
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
    </div>
    <!-- end widget -->
    <div class="row">
      <!-- Quick Mail start -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card-box">
          <div class="card-head">
            <header>Post News</header>
          </div>
          <div class="card-body ">
            <div class="mail-list">
              <p id="error_text" style="color:#da2462;"></p>
              <div class="compose-mail">
                <form method="post">
                  <input type="hidden" id="route" value="{{  route('save_post') }}">
                  <input type="hidden" id="author" value="{{  Auth::user()->name }}">
                  <div class="form-group">
                    <label for="to" class="">Title:</label>
                    <input type="text" tabindex="1" id="title" class="form-control">
                  </div>

                  <div>
                    <div id="summernote"></div>
                  </div>

                  <div class="box-footer clearfix">
                    <button type="button" id="submit_post"
                      class="mdl-button mdl-button--raised m-b-10 btn-primary pull-right">Send
                      <i class="fa fa-paper-plane-o"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Quick Mail end -->
      <!-- Activity feed start -->
      {{-- <div class="col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card-box">
          <div class="card-head">
            <header>Emergencies</header>
            <button id="feedMenu" class="mdl-button mdl-js-button mdl-button--icon pull-right"
              data-upgraded=",MaterialButton">
              <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="feedMenu">
              <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
              </li>
              <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
              </li>
              <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                here</li>
            </ul>
          </div>
          <div class="card-body ">
            <ul class="feedBody">
              <li class="active-feed">
                <div class="feed-user-img">
                  <img src="../assets/img/std/std1.jpg" class="img-radius " alt="User-Profile-Image">
                </div>
                <h6>
                  <span class="feedLblStyle lblFileStyle">File</span> Sarah Smith <small class="text-muted">6
                    hours ago</small>
                </h6>
                <p class="m-b-15 m-t-15">
                  hii John, I have upload doc related to task.
                </p>
              </li>
              <li class="diactive-feed">
                <div class="feed-user-img">
                  <img src="../assets/img/std/std2.jpg" class="img-radius " alt="User-Profile-Image">
                </div>
                <h6>
                  <span class="feedLblStyle lblTaskStyle">Task </span> Jalpa Joshi<small class="text-muted">5
                    hours
                    ago</small>
                </h6>
                <p class="m-b-15 m-t-15">
                  Please do as specify. Let me know if you have any query.
                </p>
              </li>
              <li class="diactive-feed">
                <div class="feed-user-img">
                  <img src="../assets/img/std/std3.jpg" class="img-radius " alt="User-Profile-Image">
                </div>
                <h6>
                  <span class="feedLblStyle lblCommentStyle">comment</span> Lina
                  Smith<small class="text-muted">6 hours ago</small>
                </h6>
                <p class="m-b-15 m-t-15">
                  Hey, How are you??
                </p>
              </li>
              <li class="active-feed">
                <div class="feed-user-img">
                  <img src="../assets/img/std/std4.jpg" class="img-radius " alt="User-Profile-Image">
                </div>
                <h6>
                  <span class="feedLblStyle lblReplyStyle">Reply</span> Jacob Ryan
                  <small class="text-muted">7 hours ago</small>
                </h6>
                <p class="m-b-15 m-t-15">
                  I am fine. You??
                </p>
              </li>
              <li class="active-feed">
                <div class="feed-user-img">
                  <img src="../assets/img/std/std5.jpg" class="img-radius " alt="User-Profile-Image">
                </div>
                <h6>
                  <span class="feedLblStyle lblFileStyle">File</span> Sarah Smith <small class="text-muted">6
                    hours ago</small>
                </h6>
                <p class="m-b-15 m-t-15">
                  hii John, I have upload doc related to task.
                </p>
              </li>
              <li class="diactive-feed">
                <div class="feed-user-img">
                  <img src="../assets/img/std/std6.jpg" class="img-radius " alt="User-Profile-Image">
                </div>
                <h6>
                  <span class="feedLblStyle lblTaskStyle">Task </span> Jalpa Joshi<small class="text-muted">5
                    hours
                    ago</small>
                </h6>
                <p class="m-b-15 m-t-15">
                  Please do as specify. Let me know if you have any query.
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div> --}}
      <!-- Activity feed end -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-topline-red">
                <div class="card-head">
                    <header>New Student List</header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-scrollable">
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column"
                            id="example4">
                            <thead>
                                <tr>
                                    <th>REG No</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Intake</th>
                                    <th>Intake Type</th>
                                    <th>Fees</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td>
                                        M000001
                                    </td>
                                    <td> Joe Mags </td>
                                    <td> Computer Science </td>
                                    <td> March - 2019 </td>
                                    <td>Conventional</td>
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
