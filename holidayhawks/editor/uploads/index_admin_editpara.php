<?php
/*include('includes/config.php');
include('includes/dbconn.php');
include('includes/functions.php');
include('includes/class/htmlmodule.class.php');

$objmodule=new htmlmodule();

if(isset($_REQUEST['module_id'])){

 $module_id=$_REQUEST['module_id'];
$_SESSION['moduleid']=$module_id;
$resmodule=$objmodule->view_html_module($module_id);
$arrmodule=mysql_fetch_array($resmodule);
}
if(isset($_REQUEST['Submit_btn'])){
$moduleid=$_REQUEST['updateid'];
$modulecontent=$_REQUEST['editor1'];
$objmodule->update_html_module($moduleid,$modulecontent);
echo "<script>window.opener.location=window.opener.location; window.close();</script>";

}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Paragraph</title>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../ckfinder/ckfinder.js"></script>

</head>

<body>
<form  method="post" name="form1" id="form1" action="<?php //echo $_SERVER['PHP_SELF']; ?>" >
<textarea id="editor1" name="editor1" rows="10" cols="80" class="">
<!--<textarea id="modulecontent" name="modulecontent" rows="10" cols="35" >-->
<?php  //echo $arrmodule['modulecontent'];?>
</textarea>  


<input type="hidden" name="updateid" value="<?php //echo $module_id; ?>" />
 
<br />
<input name="Submit_btn" class="button" type="submit" id="Submit_btn" value="Save"  />
</form>

<script type="text/javascript">
var editor = CKEDITOR.replace( 'editor1', {
filebrowserBrowseUrl : '../ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '../ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '../ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>
</body>
</html>
