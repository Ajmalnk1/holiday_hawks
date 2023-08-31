<?php if(isset($destinations)):foreach($destinations as $destination){?>
<div class="col-md-4 col-sm-4 li_exp_item">
	<div class="feature-center">
		<div class="list-img">
			<a href="<?php echo base_url('destinations/'.str_replace(" ","-",$destination->name));?>">
				<div class="destination-overlay"></div>
				<div class="destination-list-name">
					<h1><?php echo ucwords($destination->name);?></h1>
				</div>
				<img src="<?php echo $destination->img;?>" alt="">
			</a>
		</div>
		
		<h2><?php echo substr( strip_tags( $destination->content ),0,80);?></h2>
	</div>
</div>						
						
						
						
<?php } endif;?>						