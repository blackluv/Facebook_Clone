<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
   <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/small-business.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
                        <a href="/dashboard"><h4 id="Kammer">Dashboard</h4></a>
                    </li>
                    <li>
                        <a href="/profile"><h4 id="Kammer">Profile</h4></a>
                    </li>
                    <li>
                        <a href="/messageBoard"><h4 id="Kammer">Message Board</h4></a>
                    </li>
                    <li>
                        <a href="/main/logoff"><h4 id="Kammer">Log Off</h4></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
		<h3>Add User</h3>
		<a id="back" href="/dashboard/admin"><button class="btn" id="color">Go Back To Dashboard</button></a><br><br>
		<?

		if($this->session->flashdata('reg_errors')) {
			echo "<p>".$this->session->flashdata('reg_errors')."</p>";
		}

		?>
	<div class="col-xs-5">
		<form role="form" action="/main/add_user/add" method="post">
			  <div class="form-group">
			    <label for="email">Email address:</label>
			    <input type="email" class="form-control" name="email" id="email">
			  </div>
			  <div class="form-group">
			    <label>First Name:</label>
			    <input type="text" class="form-control" name="first_name">
			  </div>
				  <div class="form-group">
			    <label>Last Name:</label>
			    <input type="text" class="form-control" name="last_name">
			  </div>
			  <div class="form-group">
			    <label>Password:</label>
			    <input type="password" class="form-control" name="password">
			  </div>
				  <div class="form-group">
			    <label>Password Confirmation:</label>
			    <input type="password" class="form-control" name="confirm">
			  </div>
			    <input type="submit" class="btn" id="color" value="Create">
		</form>
	</div>
</div>
</body>
</html>