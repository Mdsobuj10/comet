

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Dashboard</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/feathericon.min.css')}}">
		
		<link rel="stylesheet" href="{{asset('admin/assets/plugins/morris/morris.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
		
		<!--[if lt IE 9]>
			<script src="admin/assets/js/html5shiv.min.js"></script>
			<script src="admin/assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">

    		<!-- Main Wrapper -->
            <div class="main-wrapper login-body">
                <div class="login-wrapper">
                    <div class="container">
                        <div class="loginbox">
                            <div class="login-left">
                                <img class="img-fluid" src="{{url('admin/assets/img/logo-white.png')}}" alt="Logo">
                            </div>
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <h1>Login</h1>
                                    <p class="account-subtitle">Access to our dashboard</p>
                                    @include('validation')
                                    
                                    <!-- Form -->
                                    <form action="{{route('admin.login')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input name="email" class="form-control" value="{{old('email')}}"  type="text" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" class="form-control" type="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                                        </div>
                                    </form>
                                    <!-- /Form -->
                                    
                                    <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                      
                                    <!-- Social Login -->
                                    <div class="social-login">
                                        <span>Login with</span>
                                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
                                    </div>
                                    <!-- /Social Login -->
                                    
                                    <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Main Wrapper -->
            

        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		
		<script src="{{asset('admin/assets/plugins/raphael/raphael.min.js')}}"></script>    
		<script src="{{asset('admin/assets/plugins/morris/morris.min.js')}}"></script>  
		<script src="{{asset('admin/assets/js/chart.morris.js')}}"></script>
		
		<!-- Custom JS -->
		<script  src="{{asset('admin/assets/js/script.js')}}"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->
</html>