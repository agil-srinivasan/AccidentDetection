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
          <a class="nav-link" href="add-user.php">Add user</a>
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
  </header>
  <section class="container bg-white  p-5">
      <?php if(isset($_GET['added'])){
        echo '<div class="alert alert-success">
          <strong>Success!</strong> New user successfully Added.
         </div>';
      } ?>

      <br><br>
      <?php 
        include 'connect.php';

        $fetch = mysqli_query($conn, "SELECT * FROM `user`;");
        $count = mysqli_num_rows($fetch);

        if($count == 0){ ?>
          <div class="alert alert-danger">
          <strong>No Data!</strong> Looks like there's no request.
         </div>
         <?php }
       else{ ?>

      <table class="table table-bordered table-striped">
        <tr>
        <th>Sl No</th>
        <th>Name</th>
       <th>Phone</th>
       <th>Email</th>
       <th>Relative1</th>
       <th>Relative2</th>
       <th>Relative3</th>
       <th>QR Code</th>

        
      </tr>
      <?php 
      $i = 1;
  while ($row = mysqli_fetch_assoc($fetch)) { ?>
      <tr>
        <td><?php echo $i; $i = $i +1; ?></td>
        
        <td>
          <?php echo $row['name']; ?>
        </td>
        <td>
          <?php echo $row['phone']; ?>
            
        </td>
        <td>
          <?php echo $row['email']; ?>            
        </td>

        <td>
          <?php echo $row['rel1']; ?>
            
        </td>

        <td>
          <?php echo $row['rel2']; ?>
        </td>
        <td>
          <?php echo $row['rel3']; ?>
        </td>
        <td class="text-center">
          <img src="./images/<?php echo $row['id']; ?>.png"> <br>
          <a href="./images/<?php echo $row['id']; ?>.png" download class="btn btn-info btn-sm">Download</a>
        </td>
        
      </tr> <?php } ?>

      </table>

    <?php } ?>





  </section> <!-- // container -->






 
 </body>
 </html>