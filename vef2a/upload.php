<!DOCTYPE html>
<html>
	<head>
		<?php include_once("includes/title.php") ?>
		<?php include_once("includes/header.php") ?>
		<link rel="stylesheet" type="text/css" href="style.css">

	</head>
	<body>
		<?php include_once("includes/menu.php") ?>
		<?php   ?>
			<div class="container">
				<?php
					if (isset($result)) {
						echo '<ul>';
						foreach ($result as $message) {
							echo "<li>$message</li>";
						}
						echo '</ul>';
					}
				?>
				<form action="" method="post" enctype="multipart/form-data" id="uploadImage">
					<p>
						<label for="image">Upload image:</label>
						<input type="file" name="image" id="image" >
					</p>
					<p>
						<input type="submit" name="upload" id="upload" value="upload">
					</p>
				</form>
				<p>
					asd
				</p>
				<pre>
					<?php
						if (isset($_POST['upload'])) {
							print_r($_FILES);
						}
					?>
				</pre>

				<?php
				//	use UploadsForrit\File\Upload;
				//	if (isset($_POST['upload'])) {
				//	    // define the path to the upload folder
				//	    $destination = '/var/www/html/uploads/';
				//		require_once '/var/www/html/UploadsForrit/File/uploads.php';
				//		try {
				//	        $loader = new Upload($destination);
				//			$loader->setMaxSize($max);
				//			$loader->allowAllTypes();
				//			$loader->allowAllTypes(false);
				//			$loader->upload(false);
				//	        $result = $loader->getMessages();
				//	    }
				//		catch (Exception $e) {
				//	        echo $e->getMessage();
				//	    }
				//	}

				//?>





		</div>


		<?php include_once("includes/footer.php") ?>
	</body>
</html>
