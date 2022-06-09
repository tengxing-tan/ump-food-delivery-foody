<!DOCTYPE html>
<?php
$filename = $_FILES['file']['name'];
$tmpname = $_FILES['file']['tmp_name'];
// echo $filename.'<br>'.($tmpname);

$destination = "image/$filename";
echo $destination;

if (is_uploaded_file($tmpname)) {
    echo '<br>uploaded.';
}

if (move_uploaded_file($tmpname,$destination)) {
    echo '<br>move done.';
}
?>

<html>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="file">
<button type="submit">Upload</button>
</form>
</html>