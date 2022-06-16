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
  <br><br>
  
  <section class="container bg-white  p-5">
     <?php
     include 'connect.php'; 
     if(isset($_GET['user'])){
      $user_id = $_GET['user'];

      $fech = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$user_id';");
      $count = mysqli_num_rows($fetch);
      if($count == 0 ){
        echo '<div class="alert alert-danger">
          <strong>No Data!</strong> There is no data in server for this QR.
         </div>';
      }
      else{
         while($row = mysqli_fetch_assoc($fech)){
          $rel1 = $row['rel1'];
          $rel2 = $row['rel2'];
          $rel3 = $row['rel3'];
          $_SESSION['relationship'] = 
          $rel1+"," +rel2+"," +rel3;

         } // while
      } }
     ?>
<button onclick="getLocation()">Click to Get Your Location</button>
<p>Your current Location: </p>
<p id="demo"></p>
 <br>
<hr>
<a href="" id="sms" class="btn btn-warning" target="_blank">Send SMS</a>
<hr>
<a href="" id="location" class="btn btn-info">Click Here to find Nearest hospital</a>
<hr>

<script>
var x = document.getElementById("demo");
var y = document.getElementById("location");
var z = document.getElementById("sms");

var hospital_link;
var lat, longi, posi, full_loc;
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
  lat = position.coords.latitude;
  longi = position.coords.longitude;
  posi = lat + "," +longi;
  hospital_link = 'https://www.google.com/maps/search/hospitals+near+me/@'+posi;

  y.setAttribute("href", hospital_link);
  full_loc = "send_sms.php?loc=".posi;
  z.setAttribute("href", full_loc);


}
</script>


  </section> <!-- // container -->


 </body>
 </html>