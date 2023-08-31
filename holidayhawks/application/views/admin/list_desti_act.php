<option value="">Select</option>
<?php if(isset($desti)): foreach($desti as $desti_val):?>
<option value="<?php echo $desti_val->id;?>"><?php echo $desti_val->name;?></option>
<?php endforeach; endif;?>