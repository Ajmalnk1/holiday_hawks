<form action="" method="post" name="video_upload" enctype="multipart/form-data">
<input name="new_image" id="new_image" size="30" type="file" multiple="true" />
<input type="submit" value="submit" name="submit" />
</form>

 

File Name upload.php
<?php

if (isset ($_FILES['new_image'])){

$imagename = $_FILES['new_image']['name'];
$source = $_FILES['new_image']['tmp_name'];
$type=$_FILES['new_image']['type'];

//$idate=$_REQUEST['idate'];

if(($_FILES['new_image']['type']=='image/jpeg') ||
($_FILES['new_image']['type']=='image/png')||
($_FILES['new_image']['type']=='image/bmp')||
($_FILES['new_image']['type']=='image/tiff')||
($_FILES['new_image']['type']=='image/gif'))
{
$target = "upload/".$imagename;
move_uploaded_file($source, $target);

$imagepath = $imagename;
$save = "upload/" . $imagepath; //This is the new file you saving
$file = "upload/" . $imagepath; //This is the original file

list($width, $height) = getimagesize($file) ;

$tn = imagecreatetruecolor($width, $height) ;
$image = imagecreatefromjpeg($file) ;
imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ;

imagejpeg($tn, $save, 75) ;

$save = "upload/sml_" . $thumbfile=$imagepath; //This is the new file you saving
$file = "upload/" . $fullimage=$imagepath; //This is the original file

list($width, $height) = getimagesize($file) ;

$modwidth = 155;

$diff = $width / $modwidth;

$modheight = 130;
$tn = imagecreatetruecolor($modwidth, $modheight) ;
$image = imagecreatefromjpeg($file) ;
imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

imagejpeg($tn, $save, 100) ;
"Large image: <img src='images/".$imagepath."'><br>";
"Thumbnail: <img src='images/sml_".$imagepath."'>";

}
}
else
{
echo "Please upolad .jpg, .png image file";
}
?>