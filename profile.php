<?php
	error_reporting(0);
	require_once('setup.php');

	if(isset($_GET['code']))
	{
		$token = $google->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['token'] = $token;
		if(!isset($token['error']))
		{
			$google->setAccessToken($token['access_token']);

			$service = new Google_Service_Oauth2($google);

			$data = $service->userinfo->get();

			
			$_SESSION['name'] = $data['name'];
			$_SESSION['src'] = $data['picture'];
			$_SESSION['email'] = $data['email'];

		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
  <div class="card" style="width:400px;margin:80px auto">
    <img class="card-img-top" src="<?php echo $_SESSION['src'];?>" style="width:100%">
    <div class="card-body">
      <h4 class="card-title"><?php  echo $_SESSION['name'];?></h4>
      <span><?php  echo $_SESSION['email'];?></span>
      <br>
      <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
  </div>


</div>

</body>
</html>
