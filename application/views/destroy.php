<?
	if($id == 1) {
		die('<a href="/main/dashboard/9">GO BACK</a><br> Not Allowed to Delete user 1');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	  <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/small-business.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h3>Are You Sure You Want To Delete User <?= $id ?>?</h3>
	<a href="/dashboard/admin"><button class="btn btn-info">NO</button></a>
	<a href="/main/destroy_user/<?= $id ?>"><button class="btn btn-danger">YES</button></a>
</div>
</body>
</html>