
<?php



if (isset($_POST["subnyskra"])) {


	$name=$_POST['name'];
	$email=$_POST['email'];
    $pass = hash('sha512', $_POST["password"]);
	$captcha;

        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          ?><script type="text/javascript">
			swal('Reyndu aftur!', 'captcha vantar!', 'error');

	</script><?php
          exit;
        }
        $secretKey = "6LdBNxkTAAAAAMkBOtNRo1AUD4hl3I_AbyIbCxJE";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);

	if (empty($email)){
	  ?><script type="text/javascript">
			swal('Reyndu aftur!', 'Email vantar!', 'error');

	</script><?php
	  exit;
	}

	else if (empty($name)) {
	  ?><script type="text/javascript">
			swal('Reyndu aftur!', 'Nafn vantar!', 'error');

	</script><?php
	  exit;
	  }

	else if(strlen($_POST['password']) < 8){

	  	?><script type="text/javascript">
			swal('Reyndu aftur!', 'Lykilorð verður að vera a.m.k 8 stafir!', 'error');

	</script><?php


	  exit;
	}
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	require_once("includes/dbconnect.php");

	try {

		$stmt = $pdo->prepare("INSERT INTO users (name, email, password)
		VALUES (:name, :email, :password)");
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $pass);
		$stmt->execute();

		echo "notandi " . $email." hefur verið búinn til.";





		?>
			<script type="text/javascript">
				swal('Success!', 'notandi hefur verid buinn til!', 'success');
			</script> <?php
	    }
		catch(PDOException $e) {
			echo  "problem -> " . $e->getMessage();
	    }


	$conn = null;
}



?>
