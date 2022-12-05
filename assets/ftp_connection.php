<?php

    $host = "192.168.1.118";
    $username = "admin";
    $password = "123k456s";
    $destination_dir = "/" ;
    $local_dir = "D:/xampp/htdocs/SchoolShare/assets/ftp"; 

    $ftp_connection = ftp_ssl_connect($host) or die ("Cannot connect to host");

    ftp_login($ftp_connection, $username, $password) or die("Cannot login");
    ftp_pasv($ftp_connection, true);
?>