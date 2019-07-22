@stack('before_css')
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon1.png')}}">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
     <!-- Vector CSS -->
     <link href="{{asset('css/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
     <!-- Custom CSS -->
     <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('css/default.css')}}" id="theme" rel="stylesheet">
    <!-- notice -style -->
     <link href="{{asset('css/notice-style.css')}}" id="theme" rel="stylesheet">

     <!-- datatable css -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.css')}}">

@stack('after_css')
