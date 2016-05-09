<?php
	session_start();//checka ef user er logged in, ef ekki, þá redirecta á login síðu.
	if (!isset($_SESSION['email'])) {
		 header('Location: signin.php');//bless bless
		 exit;
	}
?>
<?php
//skylgreini allar breytur um mynd.
   if(isset($_FILES['image'])){ //ef takki er ýttur er:
      	$errors= array();
	  	$uploader = $_SESSION['email'];
		$file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_tmp = $_FILES['image']['tmp_name'];
	    $file_type = $_FILES['image']['type'];
		$file_category = $_POST['picture_category'];
		$file_caption = $_POST['picture_caption'];
	    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$target_file = "uploads/" . $file_name;
        $expensions= array("jpeg","jpg","png","gif","gifv");

        if(in_array($file_ext,$expensions)=== false){// leyfi bara, algengasta eins og jpeg, png, if.
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152) {
            $errors[]='File size must be excately 2 MB';
        }
		if (file_exists($target_file)) {
    		$errors[]='file already exists';
		}

        if(empty($errors)==true) {
		    //gamalt, nota db.
			move_uploaded_file($file_tmp,"uploads/".$file_name);
			$picture = "uploads/".$file_name;
			require_once("includes/dbconnect.php");

			try {

				$stmt = $pdo->prepare("INSERT INTO pictures (picture, picture_size, picture_name, picture_format, picture_category,uploader)
				VALUES (:picture, :picture_size, :picture_name,:picture_format,:picture_category,:uploader)");
				$stmt->bindParam(':picture', $file_tmp);
				$stmt->bindParam(':picture_size', $file_size);
				$stmt->bindParam(':picture_name', $file_name);
				$stmt->bindParam(':picture_format', $file_ext);
				$stmt->bindParam(':picture_category', $file_category);
				$stmt->bindParam(':uploader', $uploader);
				$stmt->execute();

				echo "Myndin ".$file_name ." hefur verið hlaðið upp í skýið.";



			}
			catch(PDOException $e) {
				echo  "problem -> " . $e->getMessage();
			}


			$conn = null;
      }else{
       		print_r($errors);
      }
   }
?>
<html>
	<head>
		<?php include_once("includes/title.php") ?>
		<?php include_once("includes/header.php") ?>

	</head>
  <body>
  <?php include_once("includes/menu.php") ?>
<div class="container">
	<form action = "upload.php" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
				 <input type="input" name="picture_category" value=""placeholder="category"><br>
				 <input type = "submit" value="upload"/>
      <?php if (isset($_POST['image'])){
				printf($_FILES['image']);
			}


				?>
			</form>
			<div class="push"></div>
</div>
			<?php include_once("includes/footer.php") ?>
   </body>
</html>
