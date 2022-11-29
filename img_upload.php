<?php
$f_name = $_FILES['userfile']['name'];
$f_tmp_name = $_FILES['userfile']['tmp_name'];
if(move_uploaded_file($f_tmp_name, $upload_file)){
    echo "upload success";
}
else{
    echo "upload failed";
}

mysqli_query($conn, "insert into img(img_name, img_type, img_size, img_path) values('$f_name', '$f_type', $f_size, '$upload_file');");

?>