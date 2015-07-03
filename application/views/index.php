<?
	if($this->session->userdata('user')) {
		redirect("/main/dashboard/{$this->session->userdata['user']['permission']}");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- jQuery Validations -->
    <script src="/assets/js/jquery.validate.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets/css/small-business.css" rel="stylesheet">
    <style>
    /* index page header */
        #fb-text {
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
        #down {
            margin-top: 76px;
            margin-bottom: 300px;
        }
        #padding {
            padding: 0 0 0 14px;
        }

        /* End index header */

        .welcome-font {
            font-family: 'Helvetica';
            font-size: 16px;
            margin-top: -300px;
            margin-left: 35%;
            color: #3E5C99;
        }
        .welcome-font2 {
            font-family: 'Helvetica';
            font-size: 12px;
            margin-top: -10px;
            margin-left: 35%;
            color: #9daccb;
        }
        #helvetica {
            font-family: 'Helvetica';
        }
        #month-style {
            width: 13%;
            padding: 0;
            margin-left: 15px;
        }
        #day-style {
            width: 10%;
            padding: 0;
        }
        #year-style {
            width: 12%;
            padding: 0;
        }
        #signUp-button {
            background: -webkit-gradient(linear, center top, center bottom, from(#67ae55), to(#578843));
            background: -webkit-linear-gradient(#67ae55, #578843);
            background-color: #69a74e;
            -webkit-box-shadow: inset 0 1px 1px #a4e388;
            border-color: #3b6e22 #3b6e22 #2c5115;
            border: 1px solid;
            -webkit-border-radius: 5px;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            letter-spacing: 1px;
            position: relative;
            text-shadow: 0 1px 2px rgba(0,0,0,.5);
            min-width: 194px;
            padding: 7px 20px;
            text-align: center;
        }
        #background-gradiant {
            background: linear-gradient(to bottom, #feffff 0%,#d3d8e9 100%);
        }
        #header_logo {
            margin-top: 15px;
            margin-right: 15px;
        }
        #header-search {
            margin-top: 10px;
        }
        #body-text {
            font-family: 'lucida grande';
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
    </style>
    <script language="JavaScript" type="text/javascript">
        function changeDate(i) {
            var e = document.getElementById('day');
            while (e.length > 0)
                e.remove(e.length - 1);
            var j = -1;
            if (i == "na")
                k = 0;
            else if (i == 2)
                k = 28;
            else if (i == 4 || i == 6 || i == 9 || i == 11)
                k = 30;
            else
                k = 31;
            while (j++ < k) {
                var s = document.createElement('option');
                var e = document.getElementById('day');
                if (j == 0) {
                    s.text = "Day";
                    s.value = "na";
                    try {
                        e.add(s, null);
                    } catch (ex) {
                        e.add(s);
                    }
                } else {
                    s.text = j;
                    s.value = j;
                    try {
                        e.add(s, null);
                    } catch (ex) {
                        e.add(s);
                    }
                }
            }
        }
    </script>

</head>
<body id="background-gradiant">

  <!-- Header -->
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
            <img src="/assets/img/fb-login-logo.png" height="50" id="header_logo" alt="header_logo">
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-right">
        <!-- login table -->
            <table cellspacing="0" role="presentation">
                <tbody>
                    <tr>
                        <td id="padding">
                            <label for="email" id="white">Email Address</label>
                        </td>
                        <td id="padding">
                            <label for="password" id="white">Password</label>
                        </td>
                    </tr>
                    <tr>
                        <form role="form" action="/main/login_user" method="post">
                            <td id="padding">
                                <input type="text" class="inputtext" name="email" id="email" value="" tabindex="1" required>
                            </td>
                            <td id="padding">
                                <input type="password" class="inputtext" name="password" id="pass" tabindex="2" required>
                            </td>
                            <td id="padding">
                                <label><input type="submit" class="login-button" tabindex="4" value="Log In"></label>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <td id="padding">
                            <div id="checkbox">
                                <input type="checkbox" value="1" checked="1">
                                <label id="grey">Keep me logged in</label>
                            </div>
                        </td>
                        <td id="padding">
                            <div class="up">
                                <a href="#" id="grey" >Forgot your password?</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="col-md-6" >
        <div class="container-fluid">
            <div class="row" id="down">
                <img class="img-responsive img-rounded" src="/assets/img/fb-image.png" alt="mobile_pic">
                <p class="welcome-font">Welcome to my Facebook Clone</p>
                <p class="welcome-font2">A project built with PHP and Codeigniter</p>
            </div>
            </div>
        </div>

            <!-- /.col-md-8 -->
            <div class="col-md-6">
                <h1 id="body-text"><b>Sign Up</b></h1>
                <h4 id="body-text">It's free and always will be.</h4>

                <!-- Register Form -->
                <form class="form-horizontal" action="/main/add_user/register" method="post">
                  <div class="form-group">
                    <div class="col-sm-6">
                      <input type="text" name="first_name" class="form-control input-lg" placeholder="First Name" required>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="last_name" class="form-control input-lg" placeholder="Last Name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input type="email" class="form-control input-lg" name="email" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input type="email" class="form-control input-lg" name="confirm" placeholder="Confirm Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input type="password" class="form-control input-lg" name="password" placeholder="Password" required>
                    </div>
                  </div>
                  <!-- birthday select-options -->
                <label for="birthday"><h3 id="helvetica">Birthday</h3></label>
                  <div class="form-group col-sm-offset-1">
                        <div class="col-sm-3" id="month-style">
                          <select name="month" id="month" class="form-control" onChange="changeDate(this.options[selectedIndex].value);">
                              <option value="">Month</option>
                              <option value="1">Jan</option>
                              <option value="2">Feb</option>
                              <option value="3">Mar</option>
                              <option value="4">Apr</option>
                              <option value="5">May</option>
                              <option value="6">Jun</option>
                              <option value="7">Jul</option>
                              <option value="8">Aug</option>
                              <option value="9">Sep</option>
                              <option value="10">Oct</option>
                              <option value="11">Nov</option>
                              <option value="12">Dec</option>
                          </select>
                        </div>
                        <div class="col-sm-3" id="day-style">
                          <select name="day" id="day" class="form-control">
                              <option value="na">Day</option>
                          </select>
                        </div>
                        <div class="col-sm-3" id="year-style">
                          <select name="year" id="year" class="form-control">
                              <option value="na">Year</option>
                              <option value="2015">2015</option>
                              <option value="2014">2014</option>
                              <option value="2013">2013</option>
                              <option value="2012">2012</option>
                              <option value="2011">2011</option>
                              <option value="2010">2010</option>
                              <option value="2009">2009</option>
                              <option value="2008">2008</option>
                              <option value="2007">2007</option>
                              <option value="2006">2006</option>
                              <option value="2005">2005</option>
                              <option value="2004">2004</option>
                              <option value="2003">2003</option>
                              <option value="2002">2002</option>
                              <option value="2001">2001</option>
                              <option value="2000">2000</option>
                              <option value="1999">1999</option>
                              <option value="1998">1998</option>
                              <option value="1997">1997</option>
                              <option value="1996">1996</option>
                              <option value="1995">1995</option>
                              <option value="1994">1994</option>
                              <option value="1993">1993</option>
                              <option value="1992">1992</option>
                              <option value="1991">1991</option>
                              <option value="1990">1990</option>
                              <option value="1989">1989</option>
                              <option value="1988">1988</option>
                              <option value="1987">1987</option>
                              <option value="1986">1986</option>
                              <option value="1985">1985</option>
                              <option value="1984">1984</option>
                              <option value="1983">1983</option>
                              <option value="1982">1982</option>
                              <option value="1981">1981</option>
                              <option value="1980">1980</option>
                              <option value="1979">1979</option>
                              <option value="1978">1978</option>
                              <option value="1977">1977</option>
                              <option value="1976">1976</option>
                              <option value="1975">1975</option>
                              <option value="1974">1974</option>
                              <option value="1973">1973</option>
                              <option value="1972">1972</option>
                              <option value="1971">1971</option>
                          </select>
                        </div>
                        <span class="col-sm-offset-1" ><a href="#" id="fb-text">Why do I need to provide my birthday?</a></span>
                  </div>
                <!-- terms below -->
                  <p class="_58mv">By clicking Sign Up, you agree to our <a href="/legal/terms" target="_blank" rel="nofollow">Terms</a> and that you have read our <a href="/about/privacy" target="_blank" rel="nofollow">Data Policy</a>, including our <a href="/help/cookies" target="_blank" rel="nofollow">Cookie Use</a>.</p>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="sex" value="M"> Male
                        </label>
                        <label>
                          <input type="checkbox" name="sex" value="F"> Female
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <button type="submit" id="signUp-button">Sign Up</button>
                      <hr>
                    </div>
                  </div>
                </form>
            <!-- end form -->
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

        <!-- Footer -->
         <footer class="footer" id="footer">
             <div class="container-fluid">
                <img src="/assets/img/fb-logo.png" height="50" alt="footer-logo">
                <div class="pull-right">
                    <p id="footer-text"> Facebook Clone </p>
                    <p id="footer-text2">Evan Buss © 2015</p>
                </div>
             </div>
         </footer>

    <!-- jQuery -->
    <script src="/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/js/bootstrap.min.js"></script>



</body>
</html>