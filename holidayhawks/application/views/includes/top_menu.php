<?php
  $controller = $this->router->fetch_class(); // for controller
  $method = $this->router->fetch_method(); // for method
?> <ul>
	<li><a href="<?php echo base_url('about');?>"<?php if($controller=='about'):?>class="act-link"<?php endif;?> >About Us</a></li>
	<li><a href="<?php echo base_url('expertise.html');?>">Expertise </a></li>
	<li><a href="<?php echo base_url('portfolio');?>"<?php if($controller=='portfolio'):?>class="act-link"<?php endif;?> >Portfolio</a></li>
	<li><a href="<?php echo base_url('career.html');?>">Career</a></li>
	<li><a href="<?php echo base_url('contact.html');?>">Contact</a></li>
	<li><a href="<?php echo base_url('free-quote.html');?>">Free Quote</a></li>
</ul>