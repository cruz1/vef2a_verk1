<?php
    if (isset($_POST["upload"])){
        $ftp_user="uploadScript";
        $ftp_pass="password";
        $ftpServer="sftp.njalsson.is";

        // try to login
        $conn_id = @ssh2_connect($ftpServer, 22);
        if ($conn_id) {
            echo "works";
        }
        else {
            echo "doesn't work";
        }

        $auth = @ssh2_auth_password($connection, $ftp_user, $ftp_pass);

        $sftp = ssh2_sftp($connection);


    }



 ?>
