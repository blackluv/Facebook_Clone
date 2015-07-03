<?

	if($this->session->userdata('user')) {
		redirect("/main/dashboard/{$this->session->userdata['user']['permission']}");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- jQuery Validations -->
    <script src="/assets/js/jquery.validate.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets/css/small-business.css" rel="stylesheet">


</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" height="50">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="/assets/img/logo.png" height="50" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/"><h4 id="Kammer">Home</h4></a>
                    </li>
                    <li>
                        <a href="/login"><h4 id="Kammer">Sign In</h4></a>
                    </li>
                    <li>
                        <a href="/register"><h4 id="Kammer">Register</h4></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<?

	if($this->session->flashdata('login_errors')) {
		echo $this->session->flashdata('login_errors');
	}

	?>
<div class="container">
	<div class="col-xs-5">
	<h2>Sign In</h2><br>
		<form role="form" action="/main/login_user" method="post">
		  <div class="form-group">
		    <label>Email address:</label>
		    <input type="email" class="form-control" name="email" required>
		  </div>
		  <div class="form-group">
		    <label>Password:</label>
		    <input type="password" class="form-control" name="password" required>
		  </div>
		    <input type="submit" class="btn" id="color" value="Sign In">
		</form><br>
	  	<a href="/register/"><button class="btn" id="color">Not Registered?</button></a>
	</div>
</div>

</body>
</html>