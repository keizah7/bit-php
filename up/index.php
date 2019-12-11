<?php

_dc($_FILES);

if (move_uploaded_file($_FILES["file"]["tmp_name"], 'lopas.jpg')) {
   
} else {
    echo "Sorry, there was an error uploading your file.";
}

?>


<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <br><br>
    <input type="file" name="file" id="fileToUpload">
    <br><br>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>