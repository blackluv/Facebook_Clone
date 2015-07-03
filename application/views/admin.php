<?php
    $user = $this->session->userdata('user');
    // var_dump($user);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets/css/small-business.css" rel="stylesheet">
    <script>
        var data = " <?php echo $user['permission'] ?>";
        console.log(data);
        $(document).ready(function(){
            if(data === " 9") {
                $('.admin').hide();
                $('.user').show();
            } else {
                $('.user').hide();
                $('.admin').show();
            }
        });
    </script>
    <style>
        #move-up {
            margin-top: -5%;
            color: grey;
            font-family: 'Kammerlander';
        }
        #footer {
            background-color: black;
            width: 100%;
            margin-top: 20px;
        }
        #footer-text {
            color: grey;
            font-family: 'Kammerlander';
            font-size: 22px;
            margin-top: 15px;
        }
    </style>
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
                        <a href="/dashboard" class="admin"><h4 id="Kammer">Dashboard</h4></a>
                        <a href="/dashboard/admin" class="user"><h4 id="Kammer">Dashboard</h4></a>
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
            <h3 class="pull-right" id="move-up"> <?= $user['first_name']." ".$user['last_name']; ?> </h3>
        </div>
        <!-- /.container -->
    </nav>
<h1 id="SanFran">Manage Users</h1>
<a id="add" href="/add/user"><button class="btn" id="color">Add User</button></a>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created</th>
				<th>User Level</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?
				foreach ($data as $item) {
					echo "<tr>";
					echo "<td>".$item['id']."</td>";
					echo "<td><a href='/main/show/{$item['id']}'>".ucwords($item['first_name'])." ".ucwords($item['last_name'])."</a></td>";
					echo "<td>".$item['email']."</td>";
					echo "<td>".date('M d Y',strtotime($item['created_at']))."</td>";
					if($item['permission'] == '9') {
						echo "<td>Admin Level</td>";
					} else {
						echo "<td>User Level</td>";
					}
					echo "<td><a href='/edit/user/{$item['id']}'><button class='btn' id='color' type='button'>Edit</button></a></td>";
					echo "<td><a href='/main/destroy/{$item['id']}'><button class='btn' id='color' type='button'>Delete</button></a></td>";
				}
			?>
		</tbody>
	</table>
</div>
</div>

    <!-- Footer -->
     <footer class="footer" id="footer">
         <div class="container-fluid">
            <img src="/assets/img/logo.png" height="50" alt="footer-logo">
            <p class="pull-right" id="footer-text"> User Dashboard </p>
         </div>
     </footer>

</body>
</html>

