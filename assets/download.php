<?php

include "ftp_connection.php";

header('Cache-Control: public');
header('Content-Description: File Transfer');
header("Content-Disposition: attachment; filename=$_GET[file]");
header("Content-Type: application/zip");
header("Content-Transfer-Emcoding: binary");
$filepath="D:/xampp/htdocs/SchoolShare/assets/ftp/file.jpg";

ftp_get($ftp_connection, $filepath, $_GET['file'], FTP_ASCII);
readfile($filepath);
ftp_close($ftp_connection);

?>