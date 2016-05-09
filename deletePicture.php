<meta charset="utf-8">
<?php
    if (isset($_POST['subDeletePic'])) {
        $imageToDelete = $_POST['imageToDelete'];

        try {
            require_once("includes/dbconnect.php");
            $del = "DELETE FROM pictures WHERE picture_name = '$imageToDelete'";
            $pdo -> exec($del);
            echo "mynd eitt frá database";
            $file = "uploads/$imageToDelete";
            if (!unlink($file)){
                echo ("Error deleting $file");
            }
            else{
                echo ("Deleted $file");
            }

        } catch (PDOException $e) {
            echo "villa >>> " . $e;

        }

    }



 ?>
