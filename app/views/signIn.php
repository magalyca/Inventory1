<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Sign in </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link href="album.css" rel="stylesheet">

</head>

<body class="text-center">

<header>
   <div class="navbar navbar-light bg-light box-shadow">
        <div class="container d-flex justify-content-between">
            <strong>The University of Texas Rio Grande Valley </strong>
        </div>
      </div>
</header>

<br>
<h2>Inventory Management Software</h2>
<h3>Engineering </h3>
<br>
  <form class="form-signin" action="" method="post" id='mainForm'>

    <h3>Sign in</h3>

    <div class="row">
      <div class="col-md-6">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email"  name="Email" class="form-control" placeholder="Email address" required autofocus>
      </div>
      <div class="col-md-6">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password"  name="Password" class="form-control" placeholder="Password" required>
      </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Go</button>

  </form>


<!---  sign up -->
  <form class="form-signin" action="" method="post" id='mainForm2'>

    <h3>Sign up</h3>

    <div class="row">
      <input type="hidden" name="signup" value="true">
      <div class="col-md-6">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email"  name="Email" class="form-control" placeholder="Email address" required autofocus>
      </div>
      <div class="col-md-6">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password"  name="Password" class="form-control" placeholder="Password" required>
      </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>

  </form>

  <script src="js/jquery.min.js"></script>
  <script src="js/global.js"></script>
  <script src="js/signUp.js"></script>
  
</body>

</html>
