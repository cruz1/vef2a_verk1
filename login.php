<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once("includes/header.php"); ?>
</head>
<body>
<?php include_once("includes/menu.php"); ?>

<div class="container">


<?php

if (isset($_POST["subinnskra"])) {
	if (!empty($_POST["email"])) {
		$email = $_POST["email"];
	}
	else{
		?> <script type="text/javascript">
			swal('Reyndu aftur!',
				 'Email vantar!',
				 'error'
			);
		</script> <?php
	exit;
	}
	if (!empty($_POST["password"])) {
    	$pass = hash('sha512', $_POST["password"]);
	}
	else{
		?> <script type="text/javascript">
			swal(
				'Reyndu aftur!',
				'password vantar!',
				'error'
			);
		</script> <?php
		exit;
	}






	// login scripta

			require_once("includes/dbconnect.php");

			$sql = "SELECT password FROM users WHERE email='$email' LIMIT 1";
			$resault = $pdo-> query($sql);
			$returnedData = $resault->fetch();
			$dbPassword = $returnedData['password'];
			if ($pass == $dbPassword) {
				$_SESSION['email'] = $email;
				$_SESSION['authenticated'] = true;
				echo "Velkominn, " . $_SESSION['email'] . " þú ert skráður inn";
			}
			else{
			    echo "either password or username were wrong.<br>";
			    echo "<a href='signin.php'>click this to go back</a>";
				header("location: /signin.php");
			}





	}









?>
<div class="push"></div>
</div>

<?php include_once("includes/footer.php") ?>
</body>
</html>
