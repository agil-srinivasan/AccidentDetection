<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
 <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Home - Security</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script type="text/javascript">
setTimeout(
function ( )
{
  self.close();
  window.close();
}, 5000 );
</script>
</head>
<body >
	<?php 
	if(isset($_GET['loc'])){
	$loc = $_GET['loc'];
	$phones = $_SESSION['relationship'];
	$url = 'https://espsms.000webhostapp.com/index.php?msg=Help needed.Accident Occured:http://maps.google.com/maps?q=loc:'.$loc.', &num='.$phones;

	$page = file_get_contents($url);

	//https://espsms.000webhostapp.com/index.php?msg=Help needed.Accident Occured at/nhttp://maps.google.com/maps?q=loc:&num=8088021289,8892145530
}

?>
	<div class="container">
		<h1>Hold Tight, We're sending SMS</h1>
	</div>

	


</body>
</html>






