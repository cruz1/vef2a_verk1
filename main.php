<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php include_once("includes/header.php"); ?>
    <?php include_once("includes/title.php"); ?>
  </head>
  <body>
    <?php include_once("includes/menu.php"); ?>
	<div class="container">
    <form class="" action="" method="post">
        <input type="submit" name="subSearchByCtgr" value="submit">
        <input type="input" name="subCategory" value="" placeholder="hvaða category viltu sjá">
    </form>
	<?php
    // gömul mynda scripta.
     //    $num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);

    //    $folder = opendir($folder_path);

    //    if($num_files > 0){
    //         while(false !== ($file = readdir($folder))) {
    //         $file_path = $folder_path.$file;
    //         $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
    //    if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp'){
    //        <a href="<?php echo $file_path; "><img src="<?php echo $file_path; ?"  height="250" /></a>
    //        <?php
    //    }
    //}
//}
//else{
//    echo "the folder was empty !";
//}
//closedir($folder);
    if (isset($_POST['subSearchByCtgr'])) {

        $theCategory = $_POST['subCategory'];
        require_once("includes/dbconnect.php");
        $sql = "SELECT picture_name FROM pictures WHERE picture_category = '$theCategory'";


        foreach ($pdo -> query($sql) as $row) {
            $imageName = $row['picture_name'];
            $category = $row['picture_category'];
            ?>
                <a href="uploads/<?php echo $imageName ?>"><img class="userImages" src="uploads/<?php echo $imageName; ?>" alt="Random image" height="250"></a>
            <?php
        }
    }
    ?>

<div class="push"></div>
</div>
    <?php include_once("includes/footer.php"); ?>
  </body>
</html>
