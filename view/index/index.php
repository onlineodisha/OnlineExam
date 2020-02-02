<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Login </title>
    <!-- Bootstrap -->
    <link href="<?php echo URL;?>public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo URL;?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo URL;?>public/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo URL;?>public/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo URL;?>public/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form role="form" action="<?php echo URL;?>indexPage/run">
              <h1>Student Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="" />
              </div>
              <div>
                <button class="btn btn-primary" name="submit" id="submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
              <div class="clearfix"></div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
				<div class="clearfix"></div>
                <div>
                  <h1><i class="fa fa-paw"></i> </h1>
                  <p>©Online Exam</p>
                </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
