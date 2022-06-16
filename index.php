<?php
 session_start();
ob_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Accident Detection</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
  </head>
  <body class="text-center" style="background:url(reva.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;">
    
<main class="form-signin">
	<?php  
	include 'connect.php';
		if(isset($_POST['login'])){
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);
			// $password = md5($password);
			$check = mysqli_query($conn, "SELECT * from `admin` WHERE `email` = '$email' AND `password` = '$password';");

			$count = mysqli_num_rows($check);

			if($count == 0){ ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Invalid Login Details!</strong> Please check your Email or Password and try again.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

			<?php }
			else{
				$_SESSION['email'] = $email; ?>
				<script type="text/javascript">
					// Simulate an HTTP redirect:
					window.location.replace("home.php");
				</script>

		<?php 	}
		}
	 ?>
  <form action="index.php" method="post">
    <img class="mb-4 rounded-circle border"  src="security.jpg" alt="" width="200" height="200">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>

    
    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Sign in" name="login">
    <p class="mt-5 mb-3 text-muted text-center">Accident Detection <br>&copy; <?php echo date("Y"); ?></p>
  </form>
</main>


    
  </body>
</html>