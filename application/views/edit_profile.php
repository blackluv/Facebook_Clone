<?php
    $current = $this->session->userdata('user');
 // working get image by id code below
    /*** assign the image id ***/
    $image_id = 1;
    try {
        /*** connect to the database ***/
        $dbh = new PDO("mysql:host=localhost;dbname=facebook", 'root', 'root');
        /*** set the PDO error mode to exception ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*** The sql statement ***/
        $sql = "SELECT image, image_type FROM user_images WHERE image_id=$image_id";
        /*** prepare the sql ***/
        $stmt = $dbh->prepare($sql);
        /*** exceute the query ***/
        $stmt->execute();
        /*** set the fetch mode to associative array ***/
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        /*** set the header for the image ***/
        $array = $stmt->fetch();
        /*** check we have a single image and type ***/
        if(sizeof($array) == 2) {
            /*** set the headers and display the image ***/
            header("Content-type: ".$array['image_type']);
            /*** output the image ***/
            echo $array['image'];
            } else {
                throw new Exception("Out of bounds Error");
            }
        }
    catch(PDOException $e) {
        echo $e->getMessage();

    }
    catch(Exception $e) {
        echo $e->getMessage();
    }
         // die("---end---");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Show</title>
	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
       <style>
        body {
            background-color: whitesmoke;
        }
     /* message feed header */
        .new-test {
            background-color: yellow;
            height: 50px;
            width: 50px;
        }
        #fb-text {
            font-family: 'Helvetica';
            color: #3E5C99;
        }
        #fb-text-big {
            font-family: 'Helvetica';
            color: #3E5C99;
            font-size: 30px;
        }
        #fb-color {
            background-color: #3E5C99;
        }
        #fb-color-2 {
            background-color: #5A73A7;
        }
        .login-button {
            color: white;
            background-color: #5A73A7;
            border: 1px solid darkblue;
            box-shadow: 0px 1px 0px darkblue;
            border-top: 2px #7B92C0;
            font-family: 'Helvetica';
        }
        #fb-button {
            color: white;
            background-color: #5A73A7;
            border: 1px solid darkblue;
            box-shadow: 0px 1px 0px darkblue;
            border-top: 2px #7B92C0;
            font-family: 'Helvetica';
            padding:5px 25px;
            margin-bottom: 5px;
        }
        #fb-button-search {
            background-color: whitesmoke;
        }
        #white {
            color: #fff;
            font-weight: normal;
            padding-left: 1px;
            font-family: 'Helvetica';
        }
        #grey {
            border-collapse: separate;
            border-spacing: 2px;
            font-weight: normal;
            color: #9daccb;
            font-family: 'Helvetica';
        }
        .up {
            margin-bottom: 5px;
        }
        .down-search {
            margin-top: 10px;
        }
        #padding {
            padding: 0 0 0 14px;
        }
        .dropdown-menu {
            min-width: 120px;
        }
        /* End message feed header */
        .center {
            margin-left: auto;
            margin-right: auto;
        }
        #box {
            height: auto;
            margin-top: 15px;
            background: white;
            box-shadow: 5px 5px 3px grey;
            font-family: 'Helvetica';
            font-size: 14.5px;
        }
        #white-box {
            background: white;
            font-family: 'Helvetica';
            box-shadow: 5px 5px 3px grey;
            color: #3E5C99;
        }
        #white-box-status {
            background: white;
            font-family: 'Helvetica';
            margin: 10px;
        }
        #white-box-comment {
            background: white;
            font-family: 'Helvetica';
            margin-bottom: 20px;
            box-shadow: 5px 5px 3px grey;
            padding-bottom: 10px;
        }
        #white-box-friends {
            background: white;
            font-family: 'Helvetica';
            color: grey;
            margin-bottom: 20px;
            box-shadow: 5px 5px 3px grey;
            padding-bottom: 10px;
            text-transform: uppercase;
            font-size: 14px;
        }
        #white-box-bday {
            background: white;
            box-shadow: 5px 5px 3px grey;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        #bday-text {
            font-family: 'Helvetica';
            color: grey;
            text-transform: uppercase;
            font-size: 14px;
        }
        .table {
            margin-bottom: 0;
        }
        #move-right {
            margin-left: 15%;
            width: 90%;
        }
        #move-down {
            margin-top: 25px;
            width: 50px;
        }
        #down {
            margin-top: 76px;
        }
        #move-up {
            margin-top: -5%;
            color: grey;
            font-family: 'Kammerlander';
        }
        #move-text {
            margin-top: -25px;
            font-family: 'SanFran';
        }
        #color {
            width: 75px;
        }
        #width {
            width: 100%;
        }
        #header_logo {
            margin-top: 10px;
        }
        #footer {
            background-color: white;
            width: 100%;
            margin-top: 200px;
            padding-bottom: 0px;
        }
        #footer-text {
            color: #3E5C99;
            font-family: 'Helvetica';
            font-size: 22px;
            margin-top: 15px;
            margin-bottom: 0px;
            padding-bottom: 0px;
        }
        #footer-text2 {
            color: #9daccb;
            font-family: 'Helvetica';
            font-size: 16px;
            padding-bottom: 0px;
        }
        #green {
            background-color: lightgreen;
            height: 500px;
        }
        #blue {
            background-color: lightblue
        }
        #yellow {
            background-color: gold;
            height: 500px;
        }
        textarea {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            width: 100%;
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid lightgrey;
            resize: none;
        }
            textarea:focus {
                outline: none;
            }
    </style>
</head>
<body>
<div class="container">

  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" id="fb-color">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="form-group">
            <div class="form-inline" >
                <a href="/messageBoard"><img src="/assets/img/fb-logo.png" height="50" id="header_logo" alt="header_logo"></a>
                <div class="input-group">
                  <input type="text" class="form-control down-search" placeholder="Search">
                  <span class="input-group-btn">
                    <button class="btn down-search" id="fb-button-search" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                  </span>
                </div>
              </div>
          </div>
        </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-right">
                <ul class="nav navbar-nav">
                    <li><h3 class="pull-right" id="white"> <?= $user['current']['first_name']." ".$user['current']['last_name']; ?> </h3></li>
                    <li><a href="/profile" ><h4 id="white">Profile</h4></a></li>
              <li class="dropdown" >
                <a class="dropdown-toggle" id="drop4" role="button" data-toggle="dropdown" href="#">
                    <img src="/assets/img/globe.png" height="40" alt="globe">
                 <b class="caret"></b></a>
                <ul id="menu1" class="dropdown-menu" width="40" role="menu" aria-labelledby="drop4">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="/">Edit Profile</a></li>
                  <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#">next</a></li> -->
                   <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="/main/logoff">Log Out</a></li>
                </ul>
                </ul>
              </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Cover Photo -->
    <!-- <div id="down"></div> -->
    <div class="jumbotron">
      <div class="container">
        <h2 id="down"><p id="fb-text-big"><img id="profile_pic" src="/assets/img/no_profile.png" height="100" alt="no_pic"> <?=ucwords($user['user']['first_name'].' '.$user['user']['last_name'])?></p></h2>
        <p id="fb-text-big"><?=ucwords($user['user']['description'])?></p>
      </div>
    </div>

<!-- divider -->
<div class="col-sm-3">
    <div class="container">
    </div>
</div>

    <div class="col-sm-6">
        <div class="row" id="white-box">
			<table class="table table-striped">
				<thead>
					<tr>
						<th><p id="fb-text"><?=ucwords($user['user']['first_name'].' '.$user['user']['last_name'])?></p></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Registered At:</td>
						<td><?=date('M d Y',strtotime($user['user']['created_at']))?></td>
					</tr>
					<tr>
						<td>Birthday:</td>
						<td><?=$user['user']['birthday']?></td>
					</tr>
					<tr>
						<td>Email Address:</td>
						<td><?=$user['user']['email']?></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><?=$user['user']['description']?></td>
					</tr>
				</tbody>
			</table>
		</div>

<!-- divider -->
<div class="col-sm-3">
    <div class="container">
    </div>
</div>

    </div>

    <!-- Edit Info -->
    <div class="col-xs-6">
        <h2 id="fb-text-big">Edit Info</h2>
            <form action="/main/edit_user/<?= $user['user']['id'] ?>" method="post">
             <div class="form-group">
                <label id="fb-text"for="email">Email address:</label>
                <input type="email" class="form-control" name="email" id="email" required>
              </div>
              <div class="form-group">
                <label id="fb-text">First Name:</label>
                <input type="text" class="form-control" name="first_name" required>
              </div>
                  <div class="form-group">
                <label id="fb-text">Last Name:</label>
                <input type="text" class="form-control" name="last_name" required>
              </div>
                  <div class="form-group">
                <label id="fb-text">Description:</label>
                <input type="text" class="form-control" name="description" required>
              </div>
                <input class="btn" id="fb-button" type="submit" value="Change Info">
            </form>
            <!-- upload image  -->
              <form enctype="multipart/form-data" action="/main/upload/<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
                  <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
                  <div><input name="userfile" type="file" /></div>
                  <div><input class="btn btn-info" type="submit" value="Submit" /></div>
              </form>
<?php
/*** check if a file was submitted ***/
if(!isset($_FILES['userfile']))
    {
    echo '<p>Please select a file</p>';
    }
else
    {
    try    {
        upload();
        /*** give praise and thanks to the php gods ***/
        echo '<p>Thank you for submitting</p>';
        }
    catch(Exception $e)
        {
        echo '<h4>'.$e->getMessage().'</h4>';
        }
    }
?>

        </div>

        <div class="col-xs-6">
        <h2 id="fb-text-big">Change Password</h2>
            <form action="/main/edit_user_password/<?= $user['user']['id'] ?>" method='post'>
              <div class="form-group">
                <label id="fb-text">Password:</label>
                <input type="password" class="form-control" name="password" required>
              </div>
                  <div class="form-group">
                <label id="fb-text">Password Confirmation:</label>
                <input type="password" class="form-control" name="confirm" required>
              </div>
                <input type="hidden" name="id" value="<?=$user['user']['id']?>">
                <input class="btn" id="fb-button" type="submit" value="Change Password">
            </form>
        </div>


</div>
</div>

        <!-- Footer -->
         <footer class="footer" id="footer">
             <div class="container-fluid">
                <img src="/assets/img/fb-logo.png" height="50" id="header_logo" alt="footer-logo">
                <div class="pull-right">
                    <p id="footer-text"> Facebook Clone </p>
                    <p id="footer-text2">Evan Buss © 2015</p>
                </div>
             </div>
         </footer>


    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/js/bootstrap.js"></script>

</body>
</html>