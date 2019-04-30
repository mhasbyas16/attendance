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
    <script>
$(document).ready(function(){
    $("#btn1").click(function(){
        $("#forgot").fadeToggle();
    });

    alert("Untuk TA");
});

</script>
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
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('assets/img/logoo.png')}}" style="width: 70px; height: 60px;" alt="image"></a>
                </div>

            </div>
        </nav>
    </header>

    <div id="home" class="parallax first-section" data-stellar-background-ratio="0.4" style="background-image:url('{{url('assets/uploads/paralax.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                  @if(\Session::has('alert'))
                      <div class="alert alert-danger" align-center>
                      <strong>{{Session::get('alert')}}</strong>
                      </div>
                  @endif
                  <form method="post" action="{{url('/login')}}">
                  {{csrf_field()}}
                  <div class="card" id="attendance" style="display:;">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="control-label">Email</label>
                        <div>
                          <input type="text" class="form-control" name="nip" autofocus required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                          <input type="password" class="form-control" name="password" required>
                        </div>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <div class="form-group">
                          <div>
                            <input type="submit" class="btn btn-success" value="Login" name="submit"></input>
                            <a href="#btn1" id="btn1">Forgot Your Password?</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                  <form method="POST" action="{{url('/forgot')}}">
                  {{csrf_field()}}
                  <div class="card" id="forgot" style="display:none;">
                    <div class="form-group">
                      <label for="subject" class="control-label">Subject</label>
                      <div>
                        <input id="subject" type="subject" class="form-control" name="Subject" value="Im forgot my password" readonly >
                      </div>
                    </div>
                      <div class="form-group">
                        <label for="email" class="control-label">Your E-Mail</label>
                        <div>
                          <input id="email" type="email" class="form-control" name="email" autofocus required>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <div class="form-group">
                        <div>
                          <input type="submit" class="btn btn-success" value="Submit" name="submit" />
                        </div>
                      </div>
                      </div>
                    </div>
                    </form>

                  </div>

                <div class="col-md-6 col-sm-12">
                    <div class="big-tagline">
                        <h2>PT. INFINITE BUSINESS SYNERGY</h2>
                        <p class="lead">We Are Creative Agency, Let's Explore!</p>
                    </div>
                </div>
        </div>
    </div>
</div>

<div id="support" class="section db">
        <div class="container ">

            <div class="section-title text-center">
              <img class="img-responsive center-block" src="{{url('assets/img/logoo.png')}}"/>
                <p style="color: white">All Rights Reserved &copy; 2018 - <a href="{{url('/web')}}" style="color: white"> PT.Infinite Business Synergy</p>
            </div><!-- end title -->
        </div><!-- end container -->
    </div><!-- end section -->
</body>
</html>
