<?php
    // var_dump($data);
    // die();
 ?>


<!DOCTYPE html>
<html>
<head>
    <title>Message Board</title>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <script>
        $(document).ready(function(){
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <style>
        body {
            background-color: whitesmoke;
        }
     /* message feed header */
        #fb-text {
            font-family: 'Helvetica';
            color: #3E5C99;
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
            padding: 5px 25px;
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
        .down {
            margin-top: 20px;
        }
        .down-search {
            margin-top: 10px;
        }
        #padding {
            padding: 0 0 0 14px;
        }
        #pad {
            padding: 10px;
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
            padding: 20px;
        }
        #white-box-status {
            background: white;
            font-family: 'Helvetica';
            margin-bottom: 20px;
            box-shadow: 5px 5px 3px grey;
            width: 100%;
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
                    <li><h3 class="pull-right" id="white"> <?= $data['current']['first_name']." ".$data['current']['last_name']; ?> </h3></li>
                    <li><a href="/profile"><h4 id="white">Profile</h4></a></li>
              <li class="dropdown" >
                <a class="dropdown-toggle" id="drop4" role="button" data-toggle="dropdown" href="#">
                    <img src="/assets/img/globe.png" height="40" alt="globe">
                 <b class="caret"></b></a>
                <ul id="menu1" class="dropdown-menu" width="40" role="menu" aria-labelledby="drop4">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="/edit_profile">Edit Profile</a></li>
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

    <!-- wrapper -->
    <div class="col-sm-12">
        <div class="container">


    <div class="row col-sm-7">

        <div id="white-box-status">
            <div class="container-fluid" id="down">
                <div class="col-sm-12" id="pad">
                    <form action="/main/post_message/<?= $data['current']['id'] ?>" method="post">
                        <div class="input-append" >
                            <textarea type="text" class="down" id="appendedInputButton" name="message" cols="57" rows="2" placeholder="Whats on your mind?"></textarea>
                        </div>
                            <button type="submit" class="btn pull-right" id="fb-button" >Post</button>
                    </form>
                </div>
            </div>
        </div>

<!-- Show Messages & Comments -->
<?php
// var_dump($data);

if (isset($data['messages'])) {

    foreach (array_reverse($data['messages']) as $message) {
    echo '<table class="table table-striped">
            <thead>
                <tr>
                    <th id="white-box"><a href="/main/show/'.$message['user_id'].'">'.$message['author'].'</a><p class="pull-right">'.date('M d Y',strtotime($message['created_at'])).'</p></th>
                </tr>
            </thead>
            <tbody>'.
                     '<tr><td id="box" class="col-xs-8"><p>'.$message['message'].'</p></td></tr>'.
            '</tbody>
            </table>'.
            '<table class="table table-striped">
                <thead>
                    <tr>
                        <th id="white-box">Comments</th>
                    </tr>
                </thead>
                <tbody>';
                    foreach ($data['comments'] as $comment) {
                        if($message['messages_id'] === $comment['messages_id']) {
                             echo '<tr><td id="box" class="col-xs-8"><p>'.$comment['comment'].'</p><p class="pull-right control-group">'.$comment['author'].", ".date('M d Y',strtotime($comment['created_at'])).'</p></td></tr>';
                        }
                    }
        echo '</tbody>
        </table>'.

            '<div class="col-xs-12" id="white-box-comment">
                <form action="/main/post_comment/'.$data['current']['id'].'" method="post">
                    <div class="input-group">
                       <input type="text" class="form-control" name="comment" placeholder="Write a comment...">
                       <input type="hidden" name="message_id" value="'.$message['messages_id'].'" >
                       <span class="input-group-btn">
                            <button class="btn" id="fb-button" type="submit" value="Post">Post</button>
                       </span>
                    </div>
                </form>
            </div>';
            }
        }
         ?>


    <!-- </div> -->
</div>

<!-- divider -->
<div class="col-sm-1">
    <div class="container">
    </div>
</div>

        <!-- Birthdays -->
        <div class="col-sm-4" id="down">
            <div class="conainer">
                <div class="row" >
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td id="white-box">
                                    <p id="fb-text"><img src="/assets/img/bday.png" alt="bday">Birthdays:
                                        <?php
                                            $today = date('m/d/Y');
                                            $check = substr($today, 0, -5);
                                                if($check[0] == 0) {
                                                    $check = substr($check, 1);
                                                }
                                            foreach ($data['birthdays'] as $birthday) {
                                                $month_day = substr($birthday['birthday'], 0, -5);
                                                if($month_day == $check) {
                                                    $names = $birthday['first_name']." ".$birthday['last_name']." ";
                                                    echo $names;
                                                }
                                            }
                                         ?>
                                    </p>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="white-box-bday"> <p id="bday-text">Trending</p>
                                    <p id="fb-text"><img src="/assets/img/trending.png" alt="trending"> Bubba Watson making moves at the greenbrieir</p>
                                    <p id="fb-text"><img src="/assets/img/trending.png" alt="trending"> RG3 has been abusing HGH, maybe he won't get injured this year?</p>
                                    <p id="fb-text"><img src="/assets/img/trending.png" alt="trending"> Carmelo Has been training hard in the offseason, lol</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
s
<!-- divider -->
<div class="col-sm-1">
    <div class="container">
    </div>
</div>

        <!-- Friends -->
        <div class="col-sm-4" id="down">
            <div class="conainer">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td id="white-box-friends" class="title">People you may know</td>
                                <td id="white-box"><p class="pull-right">See All</p></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($data['not_friends'] as $not_friends) { ?>
                                <tr>
                                    <td id="white-box"><?= '<a href="/main/show/'.$not_friends['id'].'"><p>'.$not_friends['first_name']." ".$not_friends['last_name'].'</p></a><br>'; ?></td>
                                    <td id="white-box"><a href="/main/add_friend/<?= $not_friends['id']?>"><button class="btn" id="fb-button">Add as Friend</button></a></td>
                                </tr>
                            <?php }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

         <!-- end wrapper -->
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