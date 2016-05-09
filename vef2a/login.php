<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

	<?php include_once("includes/header.php"); ?>
</head>
<body>
<?php include_once("includes/menu.php"); ?>


<?php
echo "updated version";
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
	}

$source = 'mysql:host=tsuts.tskoli.is;dbname=0506973399_login';
$user = '0506973399';
$password = 'mypassword';
try {
$pdo = new PDO($source, $user, $password);

$pdo->exec('SET NAMES "utf8"');

} catch (PDOException $e) {
echo 'Tenging mistókst: ' . $e->getMessage();
}


// login scripta


		$sql = "SELECT password FROM users WHERE email='$email' LIMIT 1";
		$resault = $pdo-> query($sql);
		$returnedData = $resault->fetch();
		$dbPassword = $returnedData['password'];
		if ($pass == $dbPassword) {
			$_SESSION['email'] = $email;
			$_SESSION['authenticated'] = true;
			echo "Velkominn, " . $_SESSION['email'] . " þú ert skráður inn";
		}





}





?>



<?php include_once("includes/footer.php") ?>
</body>
</html>
