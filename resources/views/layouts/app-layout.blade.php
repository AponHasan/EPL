<!DOCTYPE html>
<html lang="en">
<head>
@include('_partials_.meta')
  @include('_partials_.css')
</head>
<body class="fix-header fix-sidebar card-no-border logo-center">
  @guest
    @include('welcome')
  @else
    <div id="main-wrapper">
      @include('_partials_.header')
      <!-- top menu -->
     
     <div class="page-wrapper">
            <div class="container-fluid" style="padding-right: 0px;padding-left: 0px;">
              @include('_partials_.bread_crumb')
              <div class="row">
                <div class="col-md-3" style="padding-right: 20px;padding-left: 0px;margin-bottom: 10%;">.
                @include('deshboardsidemenu.sidemenulist.employee')
                @include('deshboardsidemenu.sidemenulist.attendance')
                @include('deshboardsidemenu.sidemenulist.leavemanagement')
                <!-- @include('deshboardsidemenu.sidemenulist.dinningset') -->
                <!-- @include('deshboardsidemenu.sidemenulist.payroll') -->
                <!-- @include('deshboardsidemenu.sidemenulist.settings') -->
                </div>
                <div class="col-md-9"style="padding-right: 0px;padding-left: 0px;margin-top: 2%;">
                @yield('page-content')
                </div>
              </div>
            </div>
            @include('_partials_.footer')
     </div>
    </div>
  @endguest
    @include('_partials_.js')
  
</body>
</html>
