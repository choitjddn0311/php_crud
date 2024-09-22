<?php
$conn = mysqli_connect("localhost" , "root" , "" , "opentutorials");
$sql = "inser into topic (title,description,created) values ('mysql' , 'mysql is ....' , now())";
mysqli_query($conn, $sql);

echo mysqli_error($conn);
mysqli
?>