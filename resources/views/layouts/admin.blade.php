<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/index.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

   <!-- Font Awesome JS -->
   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>
  <div class="d-flex" id="wrapper">

   <!-- Sidebar -->
   <div class="bg-light border-right" id="sidebar-wrapper">
     <div class="sidebar-heading"><img class="navbar-brand" src="{{asset('/images/book_green.ico')}}">  Lecture Chat    <p style="text-align: center;">{{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}</p></div>
     <div class="list-group list-group-flush">
       <a href="{{url('admin/')}}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
       <a href="{{url('admin/users')}}" class="list-group-item list-group-item-action bg-light">Users</a>
       <a href="{{url('admin/universities')}}" class="list-group-item list-group-item-action bg-light">Universities</a>
       <a href="{{url('admin/courses')}}" class="list-group-item list-group-item-action bg-light">Courses</a>
       <a href="{{url('admin/modules')}}" class="list-group-item list-group-item-action bg-light">Modules</a>
       <a class="list-group-item list-group-item-action bg-light" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="text-align: center;">
            {{ __('Logout') }}
       </a>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
       </form>
     </div>
   </div>
   <!-- /#sidebar-wrapper -->

   <!-- Page Content -->
   <div id="page-content-wrapper">

     <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ml-auto">
             <!-- Authentication Links -->
    
         </ul>
       </div>
     </nav>

     <div class="container-fluid mt-4">
       <div class="animated fadeIn">
           @yield('content')

       </div>
     </div>
   </div>
   <!-- /#page-content-wrapper -->

 </div>
 <!-- /#wrapper -->
</body>
<!-- jQuery CDN - Slim version (=without AJAX) -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <!-- Popper.JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
   <!-- Bootstrap JS -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
   <script type="text/javscript">
   $(document).ready(function () {
     $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
     });
     });
   </script>
   @yield('js_includes')
</html>
