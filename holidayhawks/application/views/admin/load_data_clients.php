<?php if($total_count>0) {?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr class="course-list-header">
						<td width="50" align="center" valign="middle" class="course-list-header-sep">
							<div class="user-check">
								<input type="checkbox" id="testall"  class="chekall"/>
    						<label for="testall"></label>
							</div>
						</td>
						<td height="50" align="center" valign="middle" class="course-list-header-sep">Logo</td>
						<!--<td width="100" align="center" valign="middle">Actions</td>-->
					</tr>
<?php
$i=1;
foreach($clients as $client){
?>

<tr class="course-list-sep-btm">
		<td  align="center" valign="middle" class="course-list-sep-right">
			<div class="user-check user-check-2">
				<input type="checkbox" value="<?php echo $client->id;?>" id="test<?php echo $i;?>" />
			<label for="test<?php echo $i;?>"></label>
			</div>
		</td>
		<td align="center" valign="middle" class="course-list-sep-right"><img src="<?php echo base_url();?>/uploads/clients/<?php echo $client->img;?>"  width="100" height="100"/></td>
		
</tr>
<?php
$i++;
}//end foreach
?>
<?php if($total_count>10){ echo $pagination; }?>

<?php
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
            <td class="" colspan="3"><span style="width:100%;" class="tbl-first-col tbl-first-col-spcer tbl-row-bg">No Clients added</span></td>
            
          </tr>
		  <tr class="table-title tbl-row-sep">
           
            <td width="30px">&nbsp;</td>
            <td width="320"></td>
            
          </tr>
		  <tr class="tbl-row-sep tbl-row-style">
            <td class="" colspan="3"><span style="width:100%;" class="tbl-first-col tbl-first-col-spcer tbl-row-bg"></span></td>
            
          </tr></table>

<?php
}
//}
?>

