
<?php


if (isset($_POST["subnyskra"])) {//1
	$name=$_POST['name'];
	$email=$_POST['email'];
    $pass = hash('sha512', $_POST["password"]);
	$captcha;
	if(isset($_POST['g-recaptcha-response'])){//2
		$captcha=$_POST['g-recaptcha-response'];
	}//loka 2
	if(!$captcha){//3
    	?><script type="text/javascript">
		swal('Reyndu aftur!', 'captcha vantar!', 'error');
		</script><?php
		exit;
	}//loka 3
    $secretKey = "6LdBNxkTAAAAAMkBOtNRo1AUD4hl3I_AbyIbCxJE";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);

	if (empty($email)){//4
		?><script type="text/javascript">
		swal('Reyndu aftur!', 'Email vantar!', 'error');
		</script><?php
	  	exit;
  	}//loka 4
	else if (empty($name)) {//5
	    ?><script type="text/javascript">
		swal('Reyndu aftur!', 'Nafn vantar!', 'error');

	</script><?php
	  exit;
  }//loka 5

	else if(strlen($_POST['password']) < 8){//6

	  	?><script type="text/javascript">
			swal('Reyndu aftur!', 'Lykilorð verður að vera a.m.k 8 stafir!', 'error');

	</script><?php


	  exit;
  }//6
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	include_once("includes/dbconnect.php");

	try {//7
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "database connection successful";
		$stmt = $conn->prepare("INSERT INTO users (name, email, password)
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
	    }//7
		catch(PDOException $e) {//8
			echo  "problem -> " . $e->getMessage();
	    }//8


		$conn = null;
}//1

	if (isset($_POST['subChangePass'])) {
	    if (empty($_POST['oldPwd'])||empty($_POST['newPwd1'])||empty($_POST['newPwd2'])) {
	        echo "vantar shit";
	        exit;
	    }
	    else{
	        $oldPwd = $_POST['oldPwd'];
	        $newPwd1 = $_POST['newpwd1'];
	        $newpwd2 = $_POST['newpwd2'];
			?> <p>
				<?php echo $oldPwd . "  " . $newpwd1 ."  ". $newPwd2; ?>
			</p><?php
	    }
	}


?>
