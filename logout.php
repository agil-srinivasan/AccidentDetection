<?php
 session_start();
ob_start();

ob_flush();
session_unset();
session_destroy();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | HomeSecurity</title>
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
  <body class="text-center">
    
<main class="form-signin">
	 
    <h1>Logged out Successfully! </h1>
    <p>We're Redirecting you to login page!</p>
    <div class="col-md-8 mx-auto">
      <img src="loading.gif" class="img-fluid" alt="Work in Progress">
    
   </div>

</main>


    <script type="text/javascript">
      
        var timer = setTimeout(function() {
            window.location='./'
        }, 3000);
    </script>
    
  </body>
</html>