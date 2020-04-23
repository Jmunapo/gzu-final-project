<div class="page-bar">
  <div class="page-title-breadcrumb">
    <div class=" pull-left">
      <div class="page-title"> @yield('title')</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-right">
      <li>
        <i class="fa fa-home"></i>&nbsp;<a class="parent-item"
          href="/">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
      </li>
      <li><a class="parent-item" href="#"> @yield('breadcrumb-back')</a>&nbsp;<i class="fa fa-angle-right"></i>
      </li>
      <li class="active"> @yield('title')</li>
    </ol>
  </div>
</div>