<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

     <!-- Site Metas -->
    <title>IBS Attrack</title>

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ url('assets/style.css')}}">
    <!-- Colors CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/colors.css')}}">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/versions.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/custom.css')}}">

     <!-- ALL JS FILES -->
    <script src="{{url('assets/js/all.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{url('assets/js/custom.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="seo_version">

	<!-- LOADER -->
	<div id="preloader">
		<div id="cupcake" class="box">
			<span class="letter">L</span>
			<div class="cupcakeCircle box">
				<div class="cupcakeInner box">
					<div class="cupcakeCore box"></div>
				</div>
			</div>
			<span class="letter box">A</span>
			<span class="letter box">D</span>
			<span class="letter box">I</span>
			<span class="letter box">N</span>
			<span class="letter box">G</span>
		</div>
	</div>
	<!-- END LOADER -->

    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('assets/img/u.png')}}" style="width: 100px;height: 50px;" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav navbar-right hidden-md hidden-sm">
                        <li><a class="btn-light btn-radius btn-brd top-btn" href="{{url('/logout')}}" onclick="return confirm ('Are you Sure Want Logout {{Session::get('nama')}} ?')"><i class="fa fa-angle-double-left"></i>Log Out</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right menu-top">
                     @if ($hakakses=='admin')                   
                        <li><a href="{{url('/helpdesks')}}"><i class="fa fa-bell-o" id="status" style="font-size:36px;color:"></i></a></li>
                    @endif
                        <li><a href="{{url('/')}}">Dashboard</a></li>
                        <li><a class="{{$navhome}}" href="{{url('/homeA')}}">Home</a></li>
                        <li><a class="{{$navpresence}}" href="{{url('/record')}}">Record Presence</a></li>
                        <li><a class="{{$navactivity}}" href="{{url('/recordactivity')}}">Record Activity</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle {{$navemployee}}" data-toggle="dropdown" href="#">Employee
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/addemployee')}}">Add New Employee</a></li>
                                <li><a href="{{url('/viewemployee')}}">Data Employee</a></li>
                                <li><a href="{{url('/edit')}}/{{Session::get('nip')}}">Change Password</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
     <div class="all-page-title" style="background-image:url('{{url('assets/img/pattern-4.png')}}');">

@yield('isi')
   
    <div id="support" class="section db">
        <div class="container">
            <div class="text-center">
                <img src="{{url('assets/img/u.png')}}" />
            </div>
            <div class="section-title text-center">
                <p style="color: white">All Rights Reserved &copy; 2018 - <a href="{{url('/web')}}" style="color: white"> PT.Infinite Business Synergy</p>
            </div><!-- end title -->
        </div><!-- end container -->
    </div><!-- end section -->

 <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5be7c3b50e6b3311cb78bf51/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

    <svg id="clouds1" class="hidden-xs" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 50 80" preserveAspectRatio="none">
        <path d="M-5 100 Q 0 20 5 100 Z
            M0 100 Q 5 0 10 100
            M5 100 Q 10 30 15 100
            M10 100 Q 15 10 20 100
            M15 100 Q 20 30 25 100
            M20 100 Q 25 -10 30 100
            M25 100 Q 30 10 35 100
            M30 100 Q 35 30 40 100
            M35 100 Q 40 10 45 100
            M40 100 Q 45 50 50 100
            M45 100 Q 50 20 55 100
            M50 100 Q 55 40 60 100
            M55 100 Q 60 60 65 100
            M60 100 Q 65 50 70 100
            M65 100 Q 70 20 75 100
            M70 100 Q 75 45 80 100
            M75 100 Q 80 30 85 100
            M80 100 Q 85 20 90 100
            M85 100 Q 90 50 95 100
            M90 100 Q 95 25 100 100
            M95 100 Q 100 15 105 100 Z">
        </path>
    </svg>
    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
</body>
</html>
