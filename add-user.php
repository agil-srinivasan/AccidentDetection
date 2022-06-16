<?php
 session_start();
ob_start();

if(!$_SESSION['email']){ ?>

<script type="text/javascript">
                    // Simulate an HTTP redirect:
window.location.replace("index.php?key=signin");
</script>
<?php }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Home - Security</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      body{
      align-items: center;
  
  padding-bottom: 40px;
  background-image: url('women_safety.png');
}
    </style>

    
    <!-- Custom styles for this template -->
    <link href="style1.css" rel="stylesheet">
 </head>
 <body>
  <header class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><!-- HomeSecurity --></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="logout.php"><span class="fa fa-power-off"></span> Logout</a>
        </li>    
      </ul>
    </div>
  </div>
</nav>
  </header> <br>
  <section class="container bg-white  p-5 border">
    
      <br><br>
      <?php 
        include 'connect.php';
        $max_value = 0;

        if(isset($_POST['save'])){
          $name = trim($_POST['name']);
          $email = trim($_POST['email']);
          $phone = trim($_POST['phone']);

          $relative1 = trim($_POST['relative1']);
          $relative2 = trim($_POST['relative2']);
          $relative3 = trim($_POST['relative3']);

        $fetch = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email' OR `phone` = '$phone';");
        $count = mysqli_num_rows($fetch);

        if($count > 0){ ?>
          <div class="alert alert-danger">
          <strong>User already added!</strong> Looks like user is already registered with this email or phone.
         </div>
         <?php }
       else{
         $get_max_id = mysqli_query($conn, "SELECT MAX(id) AS maximum FROM `user`");
          $get_value = mysqli_fetch_assoc($get_max_id);
          $max_value = $get_value['maximum'];
          // echo $max_value;
          $max_value = intval($max_value);
          // echo "<br>";
           $maxi = $max_value + 1;
         

        $save = mysqli_query($conn, "INSERT INTO `user` (`name`, `email`, `phone`, `rel1`, `rel2`, `rel3`) VALUES ('$name', '$email', '$phone', '$relative1', '$relative2', '$relative3') "); 

         if($save){

            require_once 'phpqrcode-master/qrlib.php';

            $path  = "images/";
            $file = $path.$maxi.".png";
            $text = "https://infidata.in?user=".$maxi;
            QRcode::png($text, $file);

        $url = 'home.php?added'; 
        header('Location: '.$url);
        die();
      } // save
      else{
      echo '<div class="alert alert-danger">
          <strong>Error Occured!</strong> An unknown error occured. Try later.
         </div>';
       } // else

      }

     } //save ?>
        <h3 class="">Add new user</h3>
        <form action="add-user.php" method="post">
          <div class="row">
            <div class="col-md-4">
              <label>Name: </label>
              <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-4">
              <label>Phone: </label>
              <input type="number" name="phone" class="form-control" minlength="10" maxlength="10" required>
            </div>

            <div class="col-md-4">
              <label>Email: </label>
              <input type="email" name="email" class="form-control" required>
            </div>
          </div> <br>
          <div class="row">
            <div class="col-md-4">
              <label>Relative1 Phone: </label>
              <input type="number" name="relative1" class="form-control" minlength="10" maxlength="10" required>
            </div>

            <div class="col-md-4">
              <label>Relative2: </label>
              <input type="number" name="relative2" class="form-control" minlength="10" maxlength="10" required>
            </div>

            <div class="col-md-4">
              <label>Relative3: </label>
              <input type="number" name="relative3" class="form-control" minlength="10" maxlength="10" required>
            </div>
          </div> <br>

          <input type="submit" name="save" class="btn btn-lg btn-outline-primary" value="Save Details">

        </form>

      
  </section> <!-- // container -->
 
 </body>
 </html>