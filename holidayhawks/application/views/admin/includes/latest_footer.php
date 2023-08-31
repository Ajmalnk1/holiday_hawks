<script type="text/javascript" src="<?php echo base_url(ADMIN_LATEST.'js/jquery-1.11.1.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url(ADMIN_LATEST.'js/bootstrap/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url(ADMIN_LATEST.'js/utility/utility.js');?>"></script>
<?php if($controller!='admin'):?>
<script type="text/javascript" src="<?php echo base_url(ADMIN_LATEST.'js/main.js');?>"></script>
<?php endif;?>
<script type="text/javascript" src="<?php echo base_url(ADMIN_LATEST.'js/demo.js');?>"></script>
<script src='<?php echo base_url(JS_PATH_ADMIN_LATEST.'jquery-ui.min.js');?>'></script>
<?php if($controller!='admin'):?>
<script type="text/javascript">
 jQuery(document).ready(function() {

	"use strict";
	Core.init();
	Demo.init();
 });
</script>
<?php endif;?>
<script type="text/javascript" src="<?php echo base_url(ADMIN_LATEST.'js/fileupload.js');?>"></script>
<?php if($controller=='admin'):?>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'login.js'); ?>"></script>
<?php endif;?>
<?php if($controller=='admin_file'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'images.js');?>'></script>
<script type="text/javascript" src="<?php //echo base_url('assets/tools/emailportfolio.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'dropzone_portfolio.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'new_portfolio_album.js'); ?>"></script>

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'newprofile.css');?>" rel="stylesheet">

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'dropzone_dp_portfolio.css');?>" rel="stylesheet">
<script src="<?php echo base_url('tinymce/tinymce.min.js');?>"></script>
<script>

jQuery( document ).ready(function( $ ) {
tinymce.init({
    mode : "specific_textareas",
    editor_selector : "myTextEditor",
	height           : 240,
	width            : '100%',
	
    plugins: ["jbimages table link autolink print preview searchreplace code","insertdatetime media table contextmenu paste youtube"],
    toolbar      : "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link | jbimages youtube ",
	menubar          : false,
	relative_urls    : false
	});
			   
});
	
</script>
<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'jquery.selectric.js');?>"></script>
<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'demo.js');?>"></script>


<?php endif;?>

<?php if($controller=='admin_pkg_category_details'):?>
<?php if($method=='pkg_tab'){?>

<script type="text/javascript" src="<?php echo base_url();?>/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/editor/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'about_desc', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace('ami', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace('inclu_desc', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace('itn_desc1', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc2', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc3', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc4', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc5', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc6', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc7', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc8', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc9', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc10', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc11', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc12', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc13', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc14', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	var editor = CKEDITOR.replace('itn_desc15', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
<?php for($j=1;$j<=2;$j++)
{?>
	var editor = CKEDITOR.replace('inclu_desc<?php echo $j;?>', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
<?php }?>
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace('info_desc', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
	
<?php for($v=1;$v<=5;$v++)
{?>
	var editor = CKEDITOR.replace('info_desc<?php echo $v;?>', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
<?php }?>	
	
<?php for($c=1;$c<=16;$c++)
{?>
	var editor = CKEDITOR.replace('itn_desc<?php echo $c;?>', {
	filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
<?php }?>


	
//config.removePlugins = 'elementspath,save,font,NewPage';


</script>
<?php } ?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'pkg_category_details.js');?>'></script>
<script>
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>


<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'dropzone_portfolio.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'new_portfolio_album.js'); ?>"></script>

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'newprofile.css');?>" rel="stylesheet">

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'dropzone_dp_portfolio.css');?>" rel="stylesheet">
<?php endif;?>





<?php if($controller=='admin_pkg_category'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'pkg_category.js');?>'></script>
<?php endif;?>
<?php if($controller=='admin_vector'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'vector.js');?>'></script>
<?php endif;?>
<?php if($controller=='admin_exp_stays'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'exp_stays.js');?>'></script>
<?php endif;?>

<?php if($controller=='admin_exp_stays_details'):?>
<?php if($method=='exp_tab'){?>

<script type="text/javascript" src="<?php echo base_url();?>/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/editor/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'about_desc', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace('ami', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace('inclu_desc', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace('info_desc', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
var editor = CKEDITOR.replace('info_desc2', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
var editor = CKEDITOR.replace('info_desc3', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );

</script>
<?php } ?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'exp_stays_details.js');?>'></script>
<script>
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>


<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'dropzone_portfolio.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'new_portfolio_album.js'); ?>"></script>

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'newprofile.css');?>" rel="stylesheet">

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'dropzone_dp_portfolio.css');?>" rel="stylesheet">
<?php endif;?>



<?php if($controller=='admin_activities'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'activities.js');?>'></script>
<?php endif;?>

<?php if($controller=='admin_activities_details'):?>
<?php if($method=='act_tab'){?>

<script type="text/javascript" src="<?php echo base_url();?>/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/editor/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'about_desc', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace('ami', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace('inclu_desc', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace('info_desc', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
var editor = CKEDITOR.replace('info_desc2', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
var editor = CKEDITOR.replace('info_desc3', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
var editor = CKEDITOR.replace('info_desc4', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
</script>
<?php } ?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'activities_details.js');?>'></script>
<script>
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>


<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'dropzone_portfolio.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'new_portfolio_album.js'); ?>"></script>

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'newprofile.css');?>" rel="stylesheet">

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'dropzone_dp_portfolio.css');?>" rel="stylesheet">
<?php endif;?>





<?php if($controller=='admin_destination'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'destination.js');?>'></script>
<?php endif;?>
<?php if($controller=='admin_banner'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'banner.js');?>'></script>
<script type="text/javascript" src="<?php //echo base_url('assets/tools/emailportfolio.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'dropzone_portfolio.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'new_banner_album.js'); ?>"></script>

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'newprofile.css');?>" rel="stylesheet">

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'dropzone_dp_portfolio.css');?>" rel="stylesheet">

<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'jquery.selectric.js');?>"></script>
<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'demo.js');?>"></script>


<?php endif;?>
<?php if($controller=='admin_blog_category'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'blog_category.js');?>'></script>
<?php endif;?>
<?php if($controller=='admin_page'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'page.js');?>'></script>
<?php /*?><script src="<?php echo base_url('tinymce/tinymce.min.js');?>"></script>
<script>

jQuery( document ).ready(function( $ ) {
tinymce.init({
    mode : "specific_textareas",
    editor_selector : "myTextEditor",
	height           : 240,
	width            : '100%',
	
    plugins: ["jbimages table link autolink print preview searchreplace code","insertdatetime media table contextmenu paste youtube"],
    toolbar      : "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link | jbimages youtube ",
	menubar          : false,
	relative_urls    : false
	});
			   
});
	
</script><?php */?>

<script type="text/javascript" src="<?php echo base_url();?>/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/editor/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'txt_content', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>' );
//config.removePlugins = 'elementspath,save,font,NewPage';
</script>
<?php endif;?>

<?php if($controller=='admin_blog'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'blog.js');?>'></script>
<?php if($method=='view_form_blog'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'banner.js');?>'></script>
<script type="text/javascript" src="<?php //echo base_url('assets/tools/emailportfolio.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'dropzone_portfolio.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'new_banner_album.js'); ?>"></script>

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'newprofile.css');?>" rel="stylesheet">

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'dropzone_dp_portfolio.css');?>" rel="stylesheet">

<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'jquery.selectric.js');?>"></script>
<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'demo.js');?>"></script>
<?php endif;?>
<?php /*?><script type="text/javascript" src="<?php //echo base_url('assets/tools/emailportfolio.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'dropzone_portfolio.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'new_banner_album.js'); ?>"></script>

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'newprofile.css');?>" rel="stylesheet">

<link href="<?php echo base_url(CSS_PATH_ADMIN_LATEST.'dropzone_dp_portfolio.css');?>" rel="stylesheet">
<?php */?>
<?php /*?><script src="<?php echo base_url('tinymce/tinymce.min.js');?>"></script>
<script>

jQuery( document ).ready(function( $ ) {
tinymce.init({
    mode : "specific_textareas",
    editor_selector : "myTextEditor",
	height           : 240,
	width            : '100%',
	
    plugins: ["jbimages table link autolink print preview searchreplace code","insertdatetime media table contextmenu paste youtube"],
    toolbar      : "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link | jbimages youtube ",
	menubar          : false,
	relative_urls    : false
	});
			   
});
	
</script>
<?php */?>
<script type="text/javascript" src="<?php echo base_url();?>/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/editor/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'txt_content', {
filebrowserBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url();?>/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url();?>/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '<?php echo base_url();?>/' );
//config.removePlugins = 'elementspath,save,font,NewPage';
</script>


<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'jquery.selectric.js');?>"></script>
<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'demo.js');?>"></script>


<?php endif;?>
<?php if($controller=='admin_portfolio_category'):?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'pcategory.js');?>'></script>
<?php endif;?>


</body>
</html>