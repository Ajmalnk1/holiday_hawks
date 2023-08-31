<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();

	  protected $stylesheets = array(
	    'font-awesome.min.css',
	    'bootstrap.css',
	    'main.css',
	    'plugin.css',
	    'jquery.mCustomScrollbar.css'
	  );

	  protected $javascripts = array(
	  'jquery-1.9.1.min.js',
	  'bootstrap.js',
	  'main.js',
	  'scrollbar.min.js',
	  'masonry.pkgd.min.js',
	  'imagesloaded.js',
	  'classie.js',
	  'AnimOnScroll.js'
	  );

	

		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}

		function load_main($view = '', $view_data = array(), $return = FALSE)
		{
			$this->set('stylesheets', $this->stylesheets);
			$this->set('javascripts', $this->javascripts);
			$this->load('template', $view, $view_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */