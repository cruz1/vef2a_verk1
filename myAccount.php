<?php session_start();
	    //checka ef user er login, ef ekki, redirecta a login page
		if (!isset($_SESSION['email'])) {
			 header('Location: signin.php');
			 exit;
		}
	?>
	<!DOCTYPE html>
	<html>
	    <head>
	        <?php include_once "includes/header.php" ?>
	        <?php include_once "includes/title.php" ?>
	    </head>
	    <body>
	        <?php include_once("includes/menu.php") ?>
	        <div class="container">
				<?php
			//	require_once("includes/dbconnect.php");
			//	$email = $_SESSION['email'];
			//	$sql = "SELECT name FROM users WHERE email='$email LIMIT 1";
			//	$resault = $pdo-> query($sql);
			//	$username = $resault->fetch();



				 ?>
				<h1>Notandi: <?php echo htmlspecialchars($_SESSION['email']);
				 ?></h1>

	        <form class="" action="updatuser.php" method="post">
	            <p>
	                change password
	            </p>
	            <input type="password" name="oldPwd" value="" placeholder="old Password">
	            <input type="password" name="newPwd1" value="" placeholder="new password">
	            <input type="password" name="newPwd2" value="" placeholder="new password again">
	            <input type="submit" name="subChangePass" value="submit">
	        </form>
	        <br>
	        <p>
	            change email
	        </p>
	        <form class="" action="updatuser.php" method="post">
	            <input type="text" name="oldEmail" value="" placeholder="old email">
	            <input type="text" name="newEmail1" value="" placeholder="new email">
	            <input type="text" name="newEmail2" value="" placeholder="just to confirm">
	            <input type="submit" name="subChangeEmail" value="submit">
	        </form>

					<h1>Mínar myndir</h1>
					<?php
						require_once("includes/dbconnect.php");
						$uploader = $_SESSION['email'];
						$sql = "SELECT picture_name, picture_category FROM pictures WHERE uploader = '$uploader'";


						foreach ($pdo -> query($sql) as $row) {
							$imageName = $row['picture_name'];
							$category = $row['picture_category'];
							echo "Nafn >> " . htmlspecialchars($imageName) . "<br>";
							echo "Category >> " . htmlspecialchars($category) . "<br>";?>
							<form class="" action="myAccount.php" method="post">
								<input type="hidden" name="CurrentImage" value="<?php echo htmlspecialchars($imageName); ?>">
									<a href="uploads/<?php echo $imageName ?>"><img class="userImages" src="uploads/<?php echo $imageName; ?>" alt="Random image" height="250"></a><br>
								<input type="submit" name="subDeletePic" value="delete picture">
								<input type="submit" name="subDownload" value="download">
								<input type="text" name="addCategory" value="" placeholder="Breyta category">
								<input type="submit" name="subAddCategory" value="bæta category">
							</form>
							<?php
						}
						//delete image script
						if (isset($_POST['subDeletePic'])) {
							$imageToDelete = $_POST['CurrentImage'];

							try {
								require_once("includes/dbconnect.php");
								$del = "DELETE FROM pictures WHERE picture_name = '$imageToDelete'";
								$pdo -> exec($del);
								echo "mynd eitt frá database<br>";
								$file = "uploads/$imageToDelete";
								if (!unlink($file)){
									echo ("Error deleting $file");
								}
								else{
									echo ("Deleted $file<br>");
								}
								echo "refreshaðu síðu til að sjá núverandi myndir.<br>";
							} catch (PDOException $e) {
								echo "villa >>> " . $e;

							}

						}

						if (isset($_POST['subAddCategory'])) {
							$currentImage = $_POST['CurrentImage'];
							$category = $_POST['addCategory'];
							try {
								require_once('includes/dbconnect.php');
								$sql = "UPDATE pictures SET picture_category = '$category' WHERE picture_name = '$currentImage'";
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
								echo "done.";
								echo "category, " . $category . ", hefur verið breytt";
							} catch (PDOException $e) {
								echo "error >>> ". $e;
							}


						}



					?>
					<div class="push"></div>
			</div>
<?php include_once("includes/footer.php");  ?>
	    </body>
	</html>

	<?php


	 ?>
