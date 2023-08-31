<?php if(isset($exps)):foreach($exps as $exp){?>
<li class="li_exp_item">
							<div class="packit-item-img eperiential-img">
			            		<a href="<?php echo base_url('experiential-stays/'.str_replace(" ","-",$exp->name));?>">
			            			<h1><?php echo $exp->name;?></h1>
					              	<img src="<?php echo $exp->detail_img;?>" alt="">
				              	</a>
			            	</div>
			              	<div class="package-list-dtl eperiential-dtl">
			              		
			              		<p><?php echo $exp->descr;?></p>
			              	</div>
						</li>
<?php } endif;?>						