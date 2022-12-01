<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>{{env('APP_NAME')}} | {{$title}}</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{asset('css/style.css')}}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{asset('css/colors.css')}}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{asset('css/perfect-scrollbar.css')}}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="{{asset('js/semantic.min.css')}}" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page login">
        <div class="full_container">
            <div class="container">
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops, there was an error</strong>
                        <br>
                        {{Session::get('error')}}
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">&#10005;</button>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Your request was sent</strong><br>
                        {{Session::get('success')}}
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">&#10005;</button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
        <!-- jQuery -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <!-- wow animation -->
        <script src="{{asset('js/animate.js')}}"></script>
        <!-- select country -->
        <script src="{{asset('js/bootstrap-select.js')}}"></script>
        <!-- nice scrollbar -->
        <script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
        <script>
            var ps = new PerfectScrollbar('#sidebar');
        </script>
        <!-- custom js -->
        <script src="{{asset('js/custom.js')}}"></script>
   </body>
</html>