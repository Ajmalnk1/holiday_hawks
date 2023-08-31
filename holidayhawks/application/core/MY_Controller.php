<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

  

  

	public function __construct()
  {
         
            parent::__construct();
           
  }

  

 public function set_session($newdata)
    {
    	$this->session->set_userdata($newdata);
    }
 public function pagination ($page,$total_count)
 {
            
			$cur_page = $page;
			$page -= 1;
			$per_page = 10;
			$previous_btn = true;
			$next_btn = true;
			$first_btn = true;
			$last_btn = true;
			$start = $page * $per_page;
			$no_of_paginations = ceil($total_count / $per_page);

			/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
			if ($cur_page >= 7) {
				$start_loop = $cur_page - 3;
				if ($no_of_paginations > $cur_page + 3)
					$end_loop = $cur_page + 3;
				else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
					$start_loop = $no_of_paginations - 6;
					$end_loop = $no_of_paginations;
				} else {
					$end_loop = $no_of_paginations;
				}
			} else {
				$start_loop = 1;
				if ($no_of_paginations > 7)
					$end_loop = 7;
				else
					$end_loop = $no_of_paginations;
			}
			/* ----------------------------------------------------------------------------------------------------------- */
			$msg1 = "<tr><td colspan=2><div class='pagination'><ul>";
			
			// FOR ENABLING THE FIRST BUTTON
			if ($first_btn && $cur_page > 1) {
				$msg1 .= "<li p='1' class='active'>First</li>";
			} else if ($first_btn) {
				$msg1 .= "<li p='1' class='inactive'>First</li>";
			}
			
			// FOR ENABLING THE PREVIOUS BUTTON
			if ($previous_btn && $cur_page > 1) {
				$pre = $cur_page - 1;
				$msg1 .= "<li p='$pre' class='active'>Previous</li>";
			} else if ($previous_btn) {
				$msg1 .= "<li class='inactive'>Previous</li>";
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			
				if ($cur_page == $i)
					$msg1 .= "<li p='$i'  class='active'>{$i}</li>";
				else
					$msg1 .= "<li p='$i' class='active'>{$i}</li>";
			}
			
			// TO ENABLE THE NEXT BUTTON
			if ($next_btn && $cur_page < $no_of_paginations) {
				$nex = $cur_page + 1;
				$msg1 .= "<li p='$nex' class='active'>Next</li>";
			} else if ($next_btn) {
				$msg1 .= "<li class='inactive'>Next</li>";
			}
			
			// TO ENABLE THE END BUTTON
			if ($last_btn && $cur_page < $no_of_paginations) {
				$msg1 .= "<li p='$no_of_paginations' class='active'>Last</li>";
			} else if ($last_btn) {
				$msg1 .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
			}
			$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
			$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
			$msg1.='</div></td></tr>';
			return $msg1;
 }	

 


}
 