<footer class="container">
    <div class="footer">
	    <div class="footer-col">
		   	<h2><a href="<?php echo $this->Common->get_listing_url(1); ?>">New Zealand</a></h2> 
		   	<?php
			if(count($latest_newzealand_footer_data) > 0){
			?>
		   	<ul>
			    <?php
			    foreach ($latest_newzealand_footer_data as $latest_nz_foo_key => $latest_nz_foo_data) {
			    	?>
			    	<li><a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_nz_foo_data['News']['cat_slug'].'/'.$latest_nz_foo_data['News']['slug']?>"><?php echo mb_substr($latest_nz_foo_data['News']['title'], 0, 19); ?></a></li>
			    	<?php
			    }
			    ?>
		   	</ul>
		   	<?php
		   	}
		   	?>
		</div>
		<div class="footer-col">
		   	<h2><a href="<?php echo $this->Common->get_listing_url(5); ?>">Sports</a></h2> 
		   	<?php
			if(count($latest_sports_footer_data) > 0){
			?>
		   	<ul>
			    <?php
			    foreach ($latest_sports_footer_data as $latest_sp_foo_key => $latest_sp_foo_data) {
			    	?>
			    	<li><a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_sp_foo_data['News']['cat_slug'].'/'.$latest_sp_foo_data['News']['slug']?>"><?php echo mb_substr($latest_sp_foo_data['News']['title'], 0, 19); ?></a></li>
			    	<?php
			    }
			    ?>
		   	</ul>
		   	<?php
		   	}
		   	?>
		</div>
		<div class="footer-col">
		   	<h2><a href="<?php echo $this->Common->get_listing_url(4); ?>">World</a></h2> 
		   	<?php
			if(count($latest_world_footer_data) > 0){
			?>
		   	<ul>
			    <?php
			    foreach ($latest_world_footer_data as $latest_world_foo_key => $latest_world_foo_data) {
			    	?>
			    	<li><a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_world_foo_data['News']['cat_slug'].'/'.$latest_world_foo_data['News']['slug']?>"><?php echo mb_substr($latest_world_foo_data['News']['title'], 0, 19); ?></a></li>
			    	<?php
			    }
			    ?>
		   	</ul>
		   	<?php
		   	}
		   	?>
		</div>
		<div class="footer-col">
		   	<h2><a href="<?php echo $this->Common->get_listing_url(3); ?>">Gujarat</a></h2> 
		   	<?php
			if(count($latest_gujarat_footer_data) > 0){
			?>
		   	<ul>
			    <?php
			    foreach ($latest_gujarat_footer_data as $latest_guj_foo_key => $latest_guj_foo_data) {
			    	?>
			    	<li><a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_guj_foo_data['News']['cat_slug'].'/'.$latest_guj_foo_data['News']['slug']?>"><?php echo mb_substr($latest_guj_foo_data['News']['title'], 0, 19); ?></a></li>
			    	<?php
			    }
			    ?>
		   	</ul>
		   	<?php
		   	}
		   	?>
		</div>
		<div class="footer-col">
		   	<h2><a href="<?php echo $this->Common->get_listing_url(6); ?>">Bollywood</a></h2> 
		   	<?php
			if(count($latest_bollywood_footer_data) > 0){
			?>
		   	<ul>
			    <?php
			    foreach ($latest_bollywood_footer_data as $latest_bolly_foo_key => $latest_bolly_foo_data) {
			    	?>
			    	<li><a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_bolly_foo_data['News']['cat_slug'].'/'.$latest_bolly_foo_data['News']['slug']?>"><?php echo mb_substr($latest_bolly_foo_data['News']['title'], 0, 19); ?></a></li>
			    	<?php
			    }
			    ?>
		   	</ul>
		   	<?php
		   	}
		   	?>
		</div>
		<div class="footer-col">
		   	<h2><a href="<?php echo $this->Common->get_listing_url(2); ?>">India</a></h2> 
		   	<?php
			if(count($latest_india_footer_data) > 0){
			?>
		   	<ul>
			    <?php
			    foreach ($latest_india_footer_data as $latest_ind_foo_key => $latest_ind_foo_data) {
			    	?>
			    	<li><a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_ind_foo_data['News']['cat_slug'].'/'.$latest_ind_foo_data['News']['slug']?>"><?php echo mb_substr($latest_ind_foo_data['News']['title'], 0, 19); ?></a></li>
			    	<?php
			    }
			    ?>
		   	</ul>
		   	<?php
		   	}
		   	?>
		</div>
		<div class="clear"></div>
		<div class="middle-footer"> 
		   <?php
			if(count($footer_pages_data) > 0){
			$last_foo_page_num = count($footer_pages_data)-1;
			?>
		   	<ul>
			    <?php
			    foreach ($footer_pages_data as $foo_page_key => $foo_page_data) {
			    	?>
			    	<li><a href="<?php echo DEFAULT_URL.'page/'.$foo_page_data['Page']['slug']; ?>"><?php echo mb_substr($foo_page_data['Page']['title'], 0, 19); ?></a></li><?php if($foo_page_key < $last_foo_page_num) { ?>|<?php } ?>
			    	<?php
			    }
			    ?>
		   	</ul>
		   	<?php
		   	}
		   	?>
		   	<!-- <ul>
			    <li><a href="#">About Us</a></li> |
                <li><a href="#">Disclaimer</a></li> | 
                <li><a href="#">Advertise With Us</a></li> |
                <li><a href="#">Sitemap</a></li> |
				<li><a href="#">Contact Us</a></li> 
		   	</ul> -->
		</div>
		<div class="copy">
		   <div class="copy-left">Copyright © 2017 Apnugujarat.</div>
		   <div class="copy-right">Design & Developed By <a href="http://www.seawindsolution.com" target="_blank">Seawind Solution Pvt. Ltd.</a></div>
		   <div class="clear"></div>
		</div>
	</div>
</footer>