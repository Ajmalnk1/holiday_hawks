<?php if($total_count>0) {?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr class="course-list-header">
						<td width="10" align="center" valign="middle" class="course-list-header-sep">
							<div class="user-check">
								<input type="checkbox" id="testall"  class="chekall"/>
    						<label for="testall"></label>
							</div>
						</td>
						<td width="90" height="50" align="center" valign="middle" class="course-list-header-sep">Title</td>
						<td width="90" height="50" align="center" valign="middle" class="course-list-header-sep">Img</td>
						<td width="10" align="center" valign="middle">Actions</td>
					</tr>
<?php
$i=1;
foreach($pcats as $pcat){
?>

<tr class="course-list-sep-btm">
		<td height="10" align="center" valign="middle" class="course-list-sep-right">
			<div class="user-check user-check-2">
				<input type="checkbox" value="<?php echo $pcat->id;?>" id="test<?php echo $i;?>" />
			<label for="test<?php echo $i;?>"></label>
			</div>
		</td>
		<td align="center" valign="middle" class="course-list-sep-right"><?php echo $pcat->title;?></td>
		<td align="center" valign="middle" class="course-list-sep-right"><img src="<?php echo base_url();?>/uploads/pcat/<?php echo $pcat->img;?>"  width="100" height="100"/></td>
		<td align="center" valign="middle">
			<a href="<?php echo base_url("admin_portfolio_category/view_form_pcategory/".$pcat->id);?>"><button class="user-list-edit-button"></button></a>
			<a href="<?php echo base_url("admin_projects/index/".$pcat->id);?>">View Projects</a>
			</td>
</tr>
<?php
$i++;
}//end foreach


}
else
{

?>
<table width="100%" cellspacing="5" cellpadding="5" class="tbl-main-border">
          <tr class="table-title tbl-row-sep">
           
            <td width="30px">&nbsp;</td>
            <td width="320"></td>
            
          </tr>
          <tr class="tbl-row-sep tbl-row-style">
		    <td class=""></td>
            <td class="" colspan="3"><span style="width:100%;" class="tbl-first-col tbl-first-col-spcer tbl-row-bg">No Category is added.</span></td>
            
          </tr>
		  <tr class="table-title tbl-row-sep">
           
            <td width="30px">&nbsp;</td>
            <td width="320"></td>
            
          </tr>
		  <tr class="tbl-row-sep tbl-row-style">
            <td class="" colspan="3"><span style="width:100%;" class="tbl-first-col tbl-first-col-spcer tbl-row-bg"></span></td>
            
          </tr>
</table>
<?php
}
//}
?>

