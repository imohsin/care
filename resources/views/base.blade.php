<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CARE - coupon, delivery, returns, customer enquiry system. Excel import and export allows centralisation of all corporate data.">
    <meta name="author" content="Cloud MSD">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>CARE @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @section('head')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @show

  </head>

  <body>
  @if(Auth::check())
  @endif
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/Logo_5.png') }}" alt="CARE" height="22px"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</a></li>
            <li><a href="{{ route('settings') }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</a></li>
            <li><a href="{{ route('profile') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a></li>
            <li><a href="{{ route('help') }}"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Help</a></li>
            <li><a href="auth/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="{{ url('/') }}"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard <span class="sr-only">(current)</span></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="{{ route('organizations') }}"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Organizations</a></li>
            <li><a href="{{ route('coupons') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Coupons</a></li>
            <li><a href="{{ route('deliveries') }}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Deliveries</a></li>
            <li><a href="{{ route('returns') }}"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span> Returns</a></li>
            <li><a href="{{ route('enquiries') }}"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Enquiries</a></li>
            <li><a href="{{ route('import') }}"><span class="glyphicon glyphicon-open-file" aria-hidden="true"></span> Import</a></li>
            <li><a href="{{ route('export') }}"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="{{ route('settings') }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</a></li>
            <li><a href="{{ route('profile') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a></li>
            <li><a href="{{ route('help') }}"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Help</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="auth/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">@yield('title')</h1>
          @yield('body')
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
  </body>
</html>