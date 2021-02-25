<?php
session_start();
if (isset($_SESSION['role'])) {
  header("Location: dashboard.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.80.0">
  <title>Pricing example · Bootstrap v4.6</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/pricing/">



  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">



  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }


    /* MARKETING CONTENT
        -------------------------------------------------- */

    /* Center align the text within the three columns below the carousel */
    .marketing .col-lg-4 {
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .marketing h2 {
      font-weight: 400;
    }

    .marketing .col-lg-4 p {
      margin-right: .75rem;
      margin-left: .75rem;
    }


    /* Featurettes
        ------------------------- */

    .featurette-divider {
      margin: 5rem 0;
      /* Space out the Bootstrap <hr> more */
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-weight: 300;
      line-height: 1;
      letter-spacing: -.05rem;
    }


    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="pricing.css" rel="stylesheet">
</head>

<body>

  <!-- Login script -->
  <?php include('controllers/login.php'); ?>

  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm fixed-top">
    <h5 class="my-0 mr-md-auto font-weight-normal">Car Service Booking System - Admin Log In</h5>

  </div>

  <div class="container" style="padding-top: 10rem;">
    <div class="jumbotron-fluid">
      <!-- Login form -->
      <div class="App">
        <div class="vertical-center">
          <div class="inner-block">

            <form action="" method="post">
              <h3>Login</h3>

              <?php echo $accountNotExistErr; ?>
              <?php echo $emailPwdErr; ?>
              <?php echo $verificationRequiredErr; ?>
              <?php echo $email_empty_err; ?>
              <?php echo $pass_empty_err; ?>

              <div class="form-group">
                <label>Username</label>
                <input type="email" class="form-control" name="email_signin" id="email_signin" />
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password_signin" id="password_signin" />
              </div>

              <button type="submit" name="login" id="sign_in" class="btn btn-outline-primary btn-lg btn-block">Sign
                In</button>

              <button type="submit" name="booking" id="book_now" class="btn btn-outline-primary btn-lg btn-block">Book Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>