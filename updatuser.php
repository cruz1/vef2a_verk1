
<?php

    if (isset($_POST['subChangePass'])) {
        $oldpass = $_POST['oldPwd'];
        $newpass1 = $_POST['newPwd1'];
        $newpass2 = $_POST['newPwd2'];



        if (empty($oldpass) or empty($newpass1) or empty($newpass2)) {
            echo "<br>vantar eitthvad.";
            exit;
        }
        else if ($newpass1 != $newpass2) {
            # code..
            echo "<br>new 1 og new 1 are not the same.";
	          exit;
	          header('location: myAccount.php');

        }
        else {
            $newpass1 = hash('sha512', $newpass1);
            $newpass2 = hash('sha512', $newpass2);
            $oldpass = hash('sha512', $oldpass);
            echo "<br>going to check if old pass is ok, if so, then update database. ";

            //af hverju nota ég þetta en ekki .þincludesþdbconnect, cuz eg fæ eitthvern andskotans error.
            require_once("includes/dbconnect.php");

            // login scripta


        		$sql = "SELECT password FROM users WHERE email='$email' LIMIT 1";
        		$resault = $pdo-> query($sql);
        		$returnedData = $resault->fetch();
        		$dbPassword = $returnedData['password'];
        		if ($pass == $dbPassword) {
                echo "<br>old pass and database pass are one and the same. going to update";

                try {

                    $update = "UPDATE users SET password='$newpass1' WHERE password='$oldpass'";

                    // Prepare statement
                    $stmt = $pdo->prepare($update);

                    // execute the query
                    $stmt->execute();

                    // echo a message to say the UPDATE succeeded
                    echo "done.";
                }
                catch(PDOException $e){
                    echo $sql . "<br>" . $e->getMessage();
                }

                $conn = null;

            }

        }
    }

    if (isset($_POST['subChangeEmail'])) {
        $oldEmail = $_POST['oldEmail'];
      	$newEmail1 = $_POST['newEmail1'];
      	$newEmail2 = $_POST['newEmail2'];

	          if(empty($oldEmail)or empty($newEmail1) or empty($newEmail2)){
	              echo "Something is missing.";
	              exit;
	          }
	          else if($newEmail1 != $newEmail2){
	              echo "new email 1 and 2 aren't the same";
                exit;
	          }
            else {
                echo "<br>going to check if old email is ok, if so, then update database. ";

      //af hverju nota ég þetta en ekki .þincludesþdbconnect, cuz eg fæ eitthvern andskotans error.
            require_once("includes/dbconnect.php");

      // login scripta


      $sql = "SELECT email FROM users WHERE email='$email' LIMIT 1";
      $resault = $pdo-> query($sql);
      $returnedData = $resault->fetch();
      $dbEmail = $returnedData['email'];
      if ($oldEmail == $dbEmail) {
          echo "<br>old email and database email are one and the same. going to update";

          try {

              $update = "UPDATE users SET email='$newEmail1' WHERE email='$oldEmail'";

              // Prepare statement
              $stmt = $pdo->prepare($update);

              // execute the query
              $stmt->execute();

              // echo a message to say the UPDATE succeeded
              echo "done.";
          }
          catch(PDOException $e){
              echo $sql . "<br>" . $e->getMessage();
          }

          $conn = null;

      }

  }

	//check if old email is equal to db, if so, then change, add later.
	//is prepared enough or do i need encryption?
    }


 ?>
