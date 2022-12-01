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
      <link rel="icon" href="images/fevicon.png" type="image/png" />
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
      {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                   <div class="sidebar-header">
                       <div class="logo_section">
                           <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                       </div>
                   </div>
                   <div class="sidebar_user_info">
                       <div class="icon_setting"></div>
                       <div class="user_profle_side">
                           <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                           <div class="user_info">
                               <h6>{{Auth::user() != null ? Auth::user()->name : 'Unknown'}}</h6>
                               <p><span class="online_animation"></span> Online</p>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="sidebar_blog_2">
                   <h4>Features</h4>
                   <ul class="list-unstyled components">
                       <li @if(Request::url() == '/dashboard') class="active" @endif>
                           <a href="{{url('/dashboard')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                       </li>
                       <li @if(Request::url() == '/transactions') class="active" @endif><a href="{{url('/transactions')}}"><i class="fa fa-file blue2_color"></i> <span>Transactions</span></a></li>
                       <li @if(Request::url() == '/journal') class="active" @endif><a href="{{url('/journal')}}"><i class="fa fa-file orange_color"></i> <span>Journal</span></a></li>
                       <li @if(Request::url() == '/general_ledger') class="active" @endif><a href="{{url('/general_ledger')}}"><i class="fa fa-file-alt purple_color2"></i> <span>General Ledger</span></a></li>
                       <li @if(Request::url() == '/trial_balance') class="active" @endif><a href="{{url('/trial_balance')}}"><i class="fa fa-balance-scale green_color"></i> <span>Trial Balance</span></a></li>
                       <li @if(Request::url() == '/finance_statement') class="active" @endif><a href="{{url('/finance_statement')}}"><i class="fa fa-file-invoice red_color"></i> <span>Financial Statement</span></a></li>
                       <li @if(Request::url() == '/balance') class="active" @endif><a href="{{url('/balance')}}"><i class="fa fa-money-check-alt yellow_color"></i> <span>Balance</span></a></li>
                   </ul>
               </div>
           </nav>
           <div id="content">
               <div class="topbar">
                   <nav class="navbar navbar-expand-lg navbar-light">
                       <div class="full">
                           <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                           <div class="right_topbar">
                               <div class="icon_info">
                                   {{-- <ul>
                                       <li><a href="#"><i class="fa fa-bell"></i><span class="badge">2</span></a></li>
                                       <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                       <li><a href="#"><i class="fa fa-envelope"></i><span class="badge">3</span></a></li>
                                   </ul> --}}
                                   <ul class="user_profile_dd">
                                       <li>
                                           <a class="dropdown-toggle" data-toggle="dropdown">
                                               <img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" />
                                               <span class="name_user">{{Auth::user() != null ? Auth::user()->name : 'Unknown'}}</span>
                                           </a>
                                           <div class="dropdown-menu">
                                               <a class="dropdown-item" href="profile.html">My Profile</a>
                                               {{-- <a class="dropdown-item" href="settings.html">Settings</a>
                                               <a class="dropdown-item" href="help.html">Help</a> --}}
                                               <a class="dropdown-item" href="{{url('/logout')}}"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                           </div>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </nav>
               </div>
               <div class="midde_cont">
                   <div class="container-fluid">
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
           </div>
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
      <!-- owl carousel -->
      <script src="{{asset('js/owl.carousel.js')}}"></script> 
      <!-- chart js -->
      <script src="{{asset('js/Chart.min.js')}}"></script>
      <script src="{{asset('js/Chart.bundle.min.js')}}"></script>
      <script src="{{asset('js/utils.js')}}"></script>
      <script src="{{asset('js/analyser.js')}}"></script>
      <!-- nice scrollbar -->
      <script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{asset('js/custom.js')}}"></script>
      <script src="{{asset('js/chart_custom_style1.js')}}"></script>
   </body>
</html>