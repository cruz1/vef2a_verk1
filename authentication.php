<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once("includes/header.php") ?>
    </head>
    <body>
        <?php
        include_once("./includes/functions.php");

        $email = filter($_POST['email']);
        echo $email . "email";
        if (isset($_POST["submit"])) {
        	if (!empty($email)) {
                echo "string";
            }
        	else{
        		?> <script type="text/javascript">
        			swal('Reyndu aftur!',
        				 'Email vantar!',
        				 'error'
        			);
        		</script> <?php
        		exit();
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
        }
            echo $email . PHP_EOL;
            echo $pass;
        ?>

  </body>
</html>
