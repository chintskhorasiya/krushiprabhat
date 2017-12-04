<?php
echo $this->element('frontheader');
?>
<section class="main sec-part1"> <!-- sec-part1 start -->
   	<div class="container"> 
	   	<div class="left-part"> <!-- left-part start -->
	     	<div class="col-md-9 sec-part1-left">
            	<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
					<div class="carousel-inner">
					  	<?php
						// for home page latest news slider
						if(count($latest_news_gallery_data) > 0){
							foreach ($latest_news_gallery_data as $latest_news_num => $latest_news_data) {
								if(!empty($latest_news_data['News']['title'])){
									if($latest_news_num == "0"){
										echo '<div class="item active news-b">';
									} else{
										echo '<div class="item news-b">';
									}
									echo '<a href="'.DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_data['News']['cat_slug'].'/'.$latest_news_data['News']['slug'].'"><h3>'.$latest_news_data['News']['title'].'</h3></a>';
									if(!empty($latest_news_data['News']['images'])){
										$latest_news_images = explode(',', $latest_news_data['News']['images']);
										$gallery_main = $latest_news_images[0];
									} else {
										$gallery_main = DEFAULT_URL.'img/new-default.png';
									}
									echo '<a href="'.DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_data['News']['cat_slug'].'/'.$latest_news_data['News']['slug'].'"><img src="'.$gallery_main.'" alt="'.$latest_news_data['News']['title'].'" /></a>';
									echo '</div>';
								}
							}
						} else {
							// dummy data
							?>
							<div class="item active news-b">
	  					      	<a href="#"><img src="<?=DEFAULT_URL?>img/pic1.jpg" alt="" /></a>
					          	<a href="#"><h3>નોટબંધી થયા પછી આમ જનતાએ ઘરમાં રોકડ રકમ...</h3></a>
						  	</div>
						  	<div class="item news-b">
	                          	<a href="#"><img src="<?=DEFAULT_URL?>img/pic2.jpg" alt="" /></a>
					          	<a href="#"><h3>નોટબંધી થયા પછી આમ જનતાએ ઘરમાં રોકડ રકમ...</h3></a>
						  	</div>
						   	<div class="item news-b">
	                          	<a href="#"><img src="<?=DEFAULT_URL?>img/pic3.jpg" alt="" /></a>
					          	<a href="#"><h3>નોટબંધી થયા પછી આમ જનતાએ ઘરમાં રોકડ રકમ...</h3></a>
						  	</div>
						   	<div class="item news-b">
	                          <a href="#"><img src="<?=DEFAULT_URL?>img/pic4.jpg" alt="" /></a>
					          <a href="#"><h3>નોટબંધી થયા પછી આમ જનતાએ ઘરમાં રોકડ રકમ...</h3></a>
						  	</div>
						  	<?php
							// dummy data
						}
						// for home page latest news slider
						?>
					</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					   <span class="glyphicon-chevron-left"><img src="<?=DEFAULT_URL?>img/prev-arrow.png" alt="arrow"></span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
					    <span class="glyphicon-chevron-right"><img src="<?=DEFAULT_URL?>img/left-arrow.png" alt="arrow"></span>
					</a>
				</div>
         	</div>	
         	<div class="col-md-3 sec-part1-right">
             	<div class="logo-tv">
                	<img src="<?=DEFAULT_URL?>img/gujarat-tv.jpg" alt="gujarat-tv" />
             	</div> 
              	<?php
              	if(!empty($latest_news_4th_data)){
              		?>
              		<div class="news-b">
              			<?php
              			if(!empty($latest_news_4th_data['News']['images'])){
							$latest_news_images = explode(',', $latest_news_4th_data['News']['images']);
							$gallery_main = $latest_news_images[0];
						} else {
							$gallery_main = DEFAULT_URL.'img/new-default.png';
						}
						?>
	                	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_4th_data['News']['cat_slug'].'/'.$latest_news_4th_data['News']['slug']?>"><img src="<?php echo $gallery_main; ?>" alt="<?php echo $latest_news_4th_data['News']['title']; ?>" /></a>
						<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_4th_data['News']['cat_slug'].'/'.$latest_news_4th_data['News']['slug']?>"><h3><?php echo $latest_news_4th_data['News']['title']; ?></h3></a>
	              	</div>	
	              	<?php
              	}
              	?>
              	<?php
              	if(!empty($latest_news_5th_data)){
              		?>
              		<div class="news-b">
              			<?php
              			if(!empty($latest_news_5th_data['News']['images'])){
							$latest_news5_images = explode(',', $latest_news_5th_data['News']['images']);
							$gallery_main_5 = $latest_news5_images[0];
						} else {
							$gallery_main_5 = DEFAULT_URL.'img/new-default.png';
						}
						?>
	                	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_5th_data['News']['cat_slug'].'/'.$latest_news_5th_data['News']['slug']?>"><img src="<?php echo $gallery_main_5; ?>" alt="<?php echo $latest_news_5th_data['News']['title']; ?>" /></a>
						<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_5th_data['News']['cat_slug'].'/'.$latest_news_5th_data['News']['slug']?>"><h3><?php echo $latest_news_5th_data['News']['title']; ?></h3></a>
	              	</div>	
	              	<?php
              	}
              	?>
         	</div>	
		  	<div class="clear"></div>
		  	<?php
 		  	if($ads_home_latest_bottom_data)
 		  	{
 		  		if(!empty($ads_home_latest_bottom_data['Advertise']['source'])){
 		  		?>
 		  		<div class="adv4"><a target="_blank" href="<?=$ads_home_latest_bottom_data['Advertise']['link']?>"><img src="<?=$ads_home_latest_bottom_data['Advertise']['source']?>" alt="<?=$ads_home_latest_bottom_data['Advertise']['title']?>" /></a></div>
 		  		<?php
 		  		}
 		  	}
 		  	?> 		 
	   	</div> <!-- left-part end -->

	    <div class="right-part"> <!-- right-part start -->
	    	<!-- Simple Currency Rates Table START -->
			<link rel="stylesheet" type="text/css" href="//www.exchangerates.org.uk/widget/ER-SCRT2-css.php?w=180&nb=10&bdrc=E0E0E0&mbg=FFFFFF&fc=333333&tc=333333" media="screen" />
	        <div class="currency-rate-widget">
               	<!--<img src="<?=DEFAULT_URL?>img/currency-rate.jpg" alt="" />-->
				<!--<div id="erscrt2">-->
					<div id="erscrt2-widget" style="width:264px;"></div>
					<div id="erscrt2-infolink"></div>
					<script type="text/javascript">	
					var tz = '5.5';
					var w = '180';
					var mc = 'NZD';
					var nb = '10';
					var c1 = 'USD';
					var c2 = 'EUR';
					var c3 = 'AUD';
					var c4 = 'JPY';
					var c5 = 'INR';
					var c6 = 'CAD';
					var c7 = 'ZAR';
					var c8 = 'BYR';
					var c9 = 'SGD';
					var c10 = 'CNY';
					var t = 'Live Exchange Rates';
					var tc = '333333';
					var bdrc = 'E0E0E0';
					var mbg = 'FFFFFF';
					var fc = '333333';

					var ccHost = (("https:" == document.location.protocol) ? "https://www." : "http://www.");
					document.write(unescape("%3Cscript src='" + ccHost + "exchangerates.org.uk/widget/ER-SCRT2-1.php' type='text/javascript'%3E%3C/script%3E"));
					</script>
				<!--</div>-->
				<!-- Simple Currency Rates Table END -->
            </div> 
			<?php
 		  	if($ads_home_rightbar_first_data)
 		  	{
 		  		if(!empty($ads_home_rightbar_first_data['Advertise']['source'])){
 		  		?>
 		  		<div class="adv3"><a target="_blank" href="<?=$ads_home_rightbar_first_data['Advertise']['link']?>"><img src="<?=$ads_home_rightbar_first_data['Advertise']['source']?>" alt="<?=$ads_home_rightbar_first_data['Advertise']['title']?>" /></a></div>
 		  		<?php
 		  		}
 		  	}
 		  	?>
	   	</div> <!-- right-part end -->  
	    
	    <div class="clear"></div>
   	</div>
</section> <!-- sec-part1 end -->


<?php
if(count($latest_newzealand_homepage_data) > 0){
?>
<section class="main sec-part2"> <!-- sec-part2 start -->
   	<div class="container"> 
        <a href="<?php echo $this->Common->get_listing_url(1); ?>"><h2 class="main-title green">New Zealand</h2></a>
		<span class="green-border"></span>
	   	<div class="clear"></div>
	   	<?php
	   	foreach ($latest_newzealand_homepage_data as $latest_newszealand_num => $latest_newszealand_data) {
	   	?>
	   	<?php
	   		if($latest_newszealand_num == 0){
		   		echo '<div class="left-part"> <!-- left-part start -->';
		   	}
		   	if($latest_newszealand_num >= 0 && $latest_newszealand_num <= 5){
		   	?>
	       	<div class="grid-listing grid-listing-left">
	       		<?php
      			if(!empty($latest_newszealand_data['News']['images'])){
					$latest_newsze_images = explode(',', $latest_newszealand_data['News']['images']);
					$gallery_main_nz = $latest_newsze_images[0];
				} else {
					$gallery_main_nz = DEFAULT_URL.'img/new-default.png';
				}
				?>
		        <a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_newszealand_data['News']['cat_slug'].'/'.$latest_newszealand_data['News']['slug']?>"><img src="<?=$gallery_main_nz?>" alt="<?php echo $latest_newszealand_data['News']['title']; ?>" /></a>
				<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_newszealand_data['News']['cat_slug'].'/'.$latest_newszealand_data['News']['slug']?>"><h3><?php echo mb_substr($latest_newszealand_data['News']['title'], 0, 80); ?></h3></a>
		   	</div>
		   	<?php
		   	}
		   	if($latest_newszealand_num == 6){
		   	//var_dump($latest_newszealand_num);
		   	?>
           	<div class="clear"></div>
	   	</div> <!-- left-part end -->
	   	<div class="right-part"> <!-- right-part start -->
	   		<div class="news-b">
	   			<?php
      			if(!empty($latest_newszealand_data['News']['images'])){
					$latest_newsze_images = explode(',', $latest_newszealand_data['News']['images']);
					$gallery_main_nz = $latest_newsze_images[0];
				} else {
					$gallery_main_nz = DEFAULT_URL.'img/new-default.png';
				}
				?>
	   			<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_newszealand_data['News']['cat_slug'].'/'.$latest_newszealand_data['News']['slug']?>"><img src="<?=$gallery_main_nz?>" alt="<?php echo $latest_newszealand_data['News']['title']; ?>" /></a>
				<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_newszealand_data['News']['cat_slug'].'/'.$latest_newszealand_data['News']['slug']?>"><h3><?php echo mb_substr($latest_newszealand_data['News']['title'], 0, 80); ?></h3></a>
            </div>
	   	<?php } ?>	
	   	<?php
		   	if($latest_newszealand_num == 6){
		   	?>
	   	</div> <!-- right-part end -->  
	    <div class="clear"></div>
	    <?php
	    	}
		}
		?>
	</div>
</section> <!-- sec-part2 end -->
<?php } ?>

<?php
if(count($latest_australlia_homepage_data) > 0){

$last_latest_aus_num = count($latest_australlia_homepage_data)-1;
?>
<section class="main sec-part3"> <!-- sec-part3 start -->
   	<div class="container">  
	   	<div class="left-part"> <!-- left-part start -->
	      	<a href="<?php echo $this->Common->get_listing_url(7); ?>"><h2 class="main-title dark-blue">Australia</h2></a>
		  	<span class="dark-blue-border"></span>
	      	<div class="clear"></div>
	       	<?php
		   	foreach ($latest_australlia_homepage_data as $latest_aus_num => $latest_aus_data) {
		   	?>
	       		<?php if($latest_aus_num >= 0 && $latest_aus_num <= 4){ ?>
			       	<?php if($latest_aus_num == 0){ ?>
			       	<div class="col-md-6">
				     	<div class="news-b">
				     		<?php
			      			if(!empty($latest_aus_data['News']['images'])){
								$latest_aus_images = explode(',', $latest_aus_data['News']['images']);
								$gallery_main_aus = $latest_aus_images[0];
							} else {
								$gallery_main_aus = DEFAULT_URL.'img/new-default.png';
							}
							?>
		                	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_aus_data['News']['cat_slug'].'/'.$latest_aus_data['News']['slug']?>"><img src="<?=$gallery_main_aus?>" alt="" /></a>
							<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_aus_data['News']['cat_slug'].'/'.$latest_aus_data['News']['slug']?>"><h3><?php echo mb_substr($latest_aus_data['News']['title'], 0, 80); ?></h3></a>
		              	</div>
		              	<?php } ?>
					  	<?php if($latest_aus_num == 1){ ?>
					  	<ul class="list">
					  		<?php } ?>
					  		<?php if($latest_aus_num >= 1 && $latest_aus_num <= 4){ ?>
					     	<li><a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_aus_data['News']['cat_slug'].'/'.$latest_aus_data['News']['slug']?>"><?php echo mb_substr($latest_aus_data['News']['title'], 0, 80); ?></a></li>
					     	<?php } ?>
					  	<?php if($latest_aus_num == 4){ ?>
					  	</ul>
					  	<?php } ?>
				   	<?php if($latest_aus_num == 4){ ?>
				   	</div>
				   	<?php } ?>
			   	<?php } ?>
			   	<?php if($latest_aus_num >= 5 && $latest_aus_num <= $last_latest_aus_num){ ?>	
	           		<?php if($latest_aus_num == 5){ ?>
			       	<div class="col-md-6">
				     	<div class="news-b">
				     		<?php
			      			if(!empty($latest_aus_data['News']['images'])){
								$latest_aus_images = explode(',', $latest_aus_data['News']['images']);
								$gallery_main_aus = $latest_aus_images[0];
							} else {
								$gallery_main_aus = DEFAULT_URL.'img/new-default.png';
							}
							?>
		                	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_aus_data['News']['cat_slug'].'/'.$latest_aus_data['News']['slug']?>"><img src="<?=$gallery_main_aus?>" alt="" /></a>
							<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_aus_data['News']['cat_slug'].'/'.$latest_aus_data['News']['slug']?>"><h3><?php echo mb_substr($latest_aus_data['News']['title'], 0, 80); ?></h3></a>
		              	</div>
		              	<?php } ?>
					  	<?php if($latest_aus_num == 6){ ?>
					  	<ul class="list">
					  		<?php } ?>
					  		<?php if($latest_aus_num >= 6 && $latest_aus_num <= $last_latest_aus_num){ ?>
					     	<li><a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_aus_data['News']['cat_slug'].'/'.$latest_aus_data['News']['slug']?>"><?php echo mb_substr($latest_aus_data['News']['title'], 0, 80); ?></a></li>
					     	<?php } ?>
					  	<?php if($latest_aus_num == $last_latest_aus_num){ ?>
					  	</ul>
					  	<?php } ?>
				   	<?php if($latest_aus_num == $last_latest_aus_num){ ?>
				   	</div>
				   	<?php } ?>
				<?php } ?>   	
		   	<?php } ?>		   
           	<div class="clear"></div>
	   	</div> <!-- left-part end -->
	   	<div class="right-part"> <!-- right-part start -->
         	<a href="<?php echo $this->Common->get_listing_url(4); ?>"><h2 class="main-title violet">World</h2></a>
	     	<span class="violet-border"></span>
         	<div class="clear"></div> 
         	<?php
         	if(count($latest_world_homepage_data) > 0){
         	
         		foreach ($latest_world_homepage_data as $latest_world_key => $latest_world_data) {
         			# code...
         			if(!empty($latest_world_data['News']['images'])){
						$latest_world_images = explode(',', $latest_world_data['News']['images']);
						$gallery_main_world = $latest_world_images[0];
					} else {
						$gallery_main_world = DEFAULT_URL.'img/new-default.png';
					}
         			?>
         			<div class="grid-listing">
						<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_world_data['News']['cat_slug'].'/'.$latest_world_data['News']['slug']?>"><img src="<?=$gallery_main_world?>" alt="<?php echo $latest_world_data['News']['title']; ?>" /></a>
						<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_world_data['News']['cat_slug'].'/'.$latest_world_data['News']['slug']?>"><h3><?php echo mb_substr($latest_world_data['News']['title'], 0, 80); ?></h3></a>
				   	</div>
         			<?php
         		}
         	}
           	?>
           	<div class="clear"></div>	
	   	</div> <!-- right-part end -->  
	    <div class="clear"></div>
	</div>
</section> <!-- sec-part3 end -->
<?php } ?>

<?php
if(count($latest_gujarat_homepage_data) > 0){

$last_latest_guj_num = count($latest_gujarat_homepage_data)-1;
?>
<section class="main sec-part4"> <!-- sec-part4 start -->
   	<div class="container">  
	   	<div class="left-part"> <!-- left-part start -->
	      	<a href="<?php echo $this->Common->get_listing_url(3); ?>"><h2 class="main-title black">Gujarat</h2></a>
		  	<span class="black-border"></span>
	      	<div class="clear"></div>
	       	<?php
	       	foreach ($latest_gujarat_homepage_data as $latest_gujarat_key => $latest_gujarat_data) {

	       	if(!empty($latest_gujarat_data['News']['images'])){
				$latest_guj_images = explode(',', $latest_gujarat_data['News']['images']);
				$gallery_main_guj = $latest_guj_images[0];
			} else {
				$gallery_main_guj = DEFAULT_URL.'img/new-default.png';
			}
	       	?>
		       	<?php if($latest_gujarat_key >= 0 && $latest_gujarat_key <= 3) { ?>
		       		<?php if($latest_gujarat_key == 0) { ?>
		       		<div class="col-md-6 gray-bg">
		       		<?php } ?>
				   		<div class="grid-listing">
				        	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_gujarat_data['News']['cat_slug'].'/'.$latest_gujarat_data['News']['slug']?>"><img src="<?=$gallery_main_guj?>" alt="<?=$latest_gujarat_data['News']['title']?>" /></a>
							<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_gujarat_data['News']['cat_slug'].'/'.$latest_gujarat_data['News']['slug']?>"><h3><?php echo mb_substr($latest_gujarat_data['News']['title'], 0, 80); ?></h3></a>
				   		</div> 
			   		<?php if($latest_gujarat_key == 3) { ?>
			   		</div>
			   		<?php } ?>
			   	<?php } ?>

			   	<?php if($latest_gujarat_key >= 4 && $latest_gujarat_key <= $last_latest_guj_num) { ?>
			   		<?php if($latest_gujarat_key == 4) { ?>
			   		<div class="col-md-6">
			   		<div id="gujmyCarousel" class="carousel slide" data-ride="carousel"> 
						<div class="carousel-inner">
			   		<?php } ?>
				  	<div class="item <?php if($latest_gujarat_key == 4) { ?>active<?php } ?> news-b">
					      	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_gujarat_data['News']['cat_slug'].'/'.$latest_gujarat_data['News']['slug']?>"><img src="<?=$gallery_main_guj?>" alt="<?=$latest_gujarat_data['News']['title']?>" /></a>
			          	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_gujarat_data['News']['cat_slug'].'/'.$latest_gujarat_data['News']['slug']?>"><h3><?php echo mb_substr($latest_gujarat_data['News']['title'], 0, 80); ?></h3></a>
				  	</div>
					<?php if($latest_gujarat_key == $last_latest_guj_num) { ?>
						</div>
						<a class="left carousel-control" href="#gujmyCarousel" data-slide="prev">
						   <span class="glyphicon-chevron-left"><img src="<?=DEFAULT_URL?>img/prev-arrow.png" alt="arrow"></span>
						</a>
						<a class="right carousel-control" href="#gujmyCarousel" data-slide="next">
						    <span class="glyphicon-chevron-right"><img src="<?=DEFAULT_URL?>img/left-arrow.png" alt="arrow"></span>
						</a>
					</div>
					</div>
					<?php } ?>
				<?php } ?>
			<?php } ?>		   
           	<div class="clear"></div>
	   	</div> <!-- left-part end -->
	   	<div class="right-part"> <!-- right-part start -->
	        <?php
 		  	if($ads_home_rightbar_second_data)
 		  	{
 		  		if(!empty($ads_home_rightbar_second_data['Advertise']['source'])){
 		  		?>
 		  		<div class="adv3"><a target="_blank" href="<?=$ads_home_rightbar_second_data['Advertise']['link']?>"><img src="<?=$ads_home_rightbar_second_data['Advertise']['source']?>" alt="<?=$ads_home_rightbar_second_data['Advertise']['title']?>" /></a></div>
 		  		<?php
 		  		}
 		  	}
 		  	?>
	    </div> <!-- right-part end -->  
	    <div class="clear"></div>
	</div>
</section> <!-- sec-part4 end -->
<?php } ?>


<section class="main sec-part5"> <!-- sec-part5 start -->
   	<div class="container">  
	   	<div class="left-part sports"> <!-- left-part start -->
	      	<a href="<?php echo $this->Common->get_listing_url(5); ?>"><h2 class="main-title pink">Sports</h2></a>
		  	<span class="pink-border"></span>
	      	<div class="clear"></div>
	      	<?php
			if(count($latest_sports_homepage_data) > 0){
			
			$last_latest_sports_num = count($latest_sports_homepage_data)-1;

	       		foreach ($latest_sports_homepage_data as $latest_sports_key => $latest_sports_data) {
	       			if(!empty($latest_sports_data['News']['images'])){
						$latest_sports_images = explode(',', $latest_sports_data['News']['images']);
						$gallery_main_sports = $latest_sports_images[0];
					} else {
						$gallery_main_sports = DEFAULT_URL.'img/new-default.png';
					}
				?>
		      	<div class="<?php if($latest_sports_key == 0) { ?>first-news-b <?php } ?> news-b">
		      		<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_sports_data['News']['cat_slug'].'/'.$latest_sports_data['News']['slug']?>"><img src="<?=$gallery_main_sports?>" alt="$latest_sports_data['News']['title']" /></a>
					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_sports_data['News']['cat_slug'].'/'.$latest_sports_data['News']['slug']?>"><h3><?php echo mb_substr($latest_sports_data['News']['title'], 0, 80); ?></h3></a>
				</div>
	            <?php
	        	}
            }
            ?>  			  
           	<div class="clear"></div>
	   </div> <!-- left-part end -->
	   <div class="right-part"> <!-- right-part start -->
	        <?php
	        if(isset($latest_videos_homepage_data) && count($latest_videos_homepage_data) > 0)
	        {
	        ?>
	        <style>
            .youtube .play {
			    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAERklEQVR4nOWbTWhcVRTHb1IJVoxGtNCNdal2JYJReC6GWuO83PM/59yUS3FRFARdFlwYP1CfiojQWt36sRCUurRIdVFXIn41lAoVdRGrG1M01YpKrWjiYmaSl8ybZJL3cd+YA//NLObd3++eO8x79z5jSq5Gw+8kov0AP8vMR5l1BtBZQM4B8ks75wCdZdYZZj5qLZ4hov2Nht9Z9vhKKSIaB/gI4M4w62KeAO6Mte4lYOq20FxrlqqOibhHmeWbvNC9ZfDX1mLae391aN6limO/gwgvAPJbWeAZuSDingdwXTBw7/0IsyaA/Fkh+KqOkD+YNfHej1QKD+y7iVlOhgLvFqFfNJvNGyuBJ+KDAF8MDd0tgS8y64OlgSdJMsysL4cG7SOHkyQZLhTee7+d2R2rAVy/S+Jd7/32ouBHAP4gNNRGQyTHc/84NhqNywZp5rvjjnnvt21aABFeCQ+RLwAf2hQ8s7sv9OCLk6AHNgQvIrvbfzKCD76g/O6cu7lf/iER/aQGgy448pExZmhdegAPhR9sObFWH1gT3lp7DaA/5bkIgJhZPgsNmz02novj+KqeApj1ubwXWe4kdyeznAgNvTpE/HQmvKqOMeuFogTUVQSRno+iaLRLAJF7uIgL9O4ubgL8aWgB7S44mNX+35YpICUiAvS9sBLkq1WzT+NFffl6AuoiApi6NT37h6sWkBIRZGkQ8YtLgyji6e1mBYTqCEBPG2Naz+0BWQgtoGoRgCzEsd9hAN1X5BfnFZASUfrSAFQNsyZ1FJASUVpHiLinDJG8U2cBZYogkrcNs5waBAGdstbeU9zdqpw0gPwwSAI6VUxHyFlDpOcHUUBBIuYNs14aZAE5RVwyzPr3/0EAEY0TyfGNjBWQvwZ +CTSbehfAH29mrID8bET0+0EUkAd8WYDOmqJ3ecsG30yr9wqRfm6Y+a1BEFDEjHfHvWmY9ck6CygHvBVr8Xhtb4ZE5HZA3y8DvBNA1TjnrmXWf+sioMwZX5V/VHXMGGMMoKdDCxCRvRWBdzKzdHEO+EisilbPyopHYqp6S9UCAsz4iojI7hUDAtyXVQgIDd6KnOoaWNkbI6FaPSuZGyMArsi7MZoloB4zviI/Nhr3X95jltwTRQmoIfgisy5ai+me67OI7fE4nrqjrqfK1t0eby0FPRB6oGVlchL3rgnfrq19RKbVBdhV9IOSwJmfmJi4vi/4ThERitwyCxVAFqydshuCX5awhQ9KtmuIWd8IDZED/nXT77rvVVv6sHRKwjYi91poqP7Dr+Y6JJ1VSZIMA3wkPNy6bX+o8Bcm0sXMdwM8Fxo0A3xORPaWBp6uPXsmbxCRD0NDL0dOANhVCXy6iAjMcjbcrMt3RITKwdMVRdFo+y5yvkL4eWZ+zHt/ZVD4dEVRNGotpst+dZZZH8k86lqn2pIvT/eqrNfn2xuyqYPZ8mv7s8pfn/8Pybm4TIjanscAAAAASUVORK5CYII=") no-repeat center center;
			    background-size: 64px 64px;
			    position: absolute;
			    height: 100%;
			    width: 100%;
			    opacity: .8;
			    filter: alpha(opacity=80);
			    transition: all 0.2s ease-out;
			}

			.youtube .play:hover {
			    opacity: 1;
			    filter: alpha(opacity=100);
			}
            </style>
            <!-- <div class="youtube"
			     id="fsrJWUVoXeM" 
			     style="width: 500px; height: 281px;">
			</div> -->

			<!-- <div class="youtube" 
			     id="lR4tJr7sMPM" 
			     data-params="modestbranding=1&showinfo=0&controls=0&vq=hd720"
			     style="width: 640px; height: 360px;">
			</div> -->
			<script type="text/javascript">
				'use strict';
				function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}
				r(function(){
				    if (!document.getElementsByClassName) {
				        // IE8 support
				        var getElementsByClassName = function(node, classname) {
				            var a = [];
				            var re = new RegExp('(^| )'+classname+'( |$)');
				            var els = node.getElementsByTagName("*");
				            for(var i=0,j=els.length; i<j; i++)
				                if(re.test(els[i].className))a.push(els[i]);
				            return a;
				        }
				        var videos = getElementsByClassName(document.body,"youtube");
				    } else {
				        var videos = document.getElementsByClassName("youtube");
				    }

				    var nb_videos = videos.length;
				    for (var i=0; i<nb_videos; i++) {
				        // Based on the YouTube ID, we can easily find the thumbnail image
				        videos[i].style.backgroundImage = 'url(http://i.ytimg.com/vi/' + videos[i].id + '/hqdefault.jpg)';

				        // Overlay the Play icon to make it look like a video player
				        var play = document.createElement("div");
				        play.setAttribute("class","play");
				        videos[i].appendChild(play);

				        videos[i].onclick = function() {
				            // Create an iFrame with autoplay set to true
				            var iframe = document.createElement("iframe");
				            var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
				            if (this.getAttribute("data-params")) iframe_url+='&'+this.getAttribute("data-params");
				            iframe.setAttribute("src",iframe_url);
				            iframe.setAttribute("frameborder",'0');

				            // The height and width of the iFrame should be the same as parent
				            iframe.style.width  = this.style.width;
				            iframe.style.height = this.style.height;

				            // Replace the YouTube thumbnail with YouTube Player
				            this.parentNode.replaceChild(iframe, this);
				        }
				    }
				});
			</script>
	        <a href="<?=DEFAULT_URL.'videos'?>"><h2 class="main-title yellow">Videos</h2></a>
		    <span class="yellow-border"></span>
	        <div class="clear"></div> 
	        <div id="videomyCarousel" class="carousel slide" data-ride="carousel">
	        	<div class="carousel-inner">
	        		<?php
	        		$youtube_regex_pattern = "/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/";
					$match;

	        		foreach ($latest_videos_homepage_data as $video_key => $video_data) {
	        		?>
	        		<div class="item <?php if($video_key == 0){ echo "active"; } ?> news-b">
	        			<a href="#">
	        			<?php
            			if(preg_match($youtube_regex_pattern, $video_data['Video']['video'], $match)){
						    //echo "Youtube video id is: ".$match[4];
						    ?>
						    <div class="youtube" id="<?=$match[4];?>" style="width: 100%; height: 250px;background-size: 100%;">
							</div>
						    <?php
						}else{
						    echo $video_data['Video']['title'];
						}
            			?>
	        			</a>
	        			<a href="#"><h3><?php echo mb_substr($video_data['Video']['title'], 0, 80); ?></h3></a>
	        		</div>
	        		<?php
	        		}
	        		?>
				</div>

				<a class="left carousel-control" href="#videomyCarousel" data-slide="prev">
					<span class="glyphicon-chevron-left"><img src="<?=DEFAULT_URL?>img/prev-arrow.png" alt="arrow"></span>
				</a>
				<a class="right carousel-control" href="#videomyCarousel" data-slide="next">
					<span class="glyphicon-chevron-right"><img src="<?=DEFAULT_URL?>img/left-arrow.png" alt="arrow"></span>
				</a>
			</div>
           	<div class="clear"></div>	
           	<?php
           	}
           	?>
	   	</div> <!-- right-part end -->  
	    <div class="clear"></div>
	</div>
</section> <!-- sec-part5 end -->

<section class="main sec-part6"> <!-- sec-part6 start -->
   	<div class="container">  
	   	<div class="left-part sports"> <!-- left-part start -->
	      	<?php
			if(count($latest_bollywood_homepage_data) > 0){
			$last_bollywood_sports_num = count($latest_bollywood_homepage_data)-1;
			?>
	      	<a href="<?php echo $this->Common->get_listing_url(6); ?>"><h2 class="main-title red">Bollywood</h2></a>
		  	<span class="red-border"></span>
	      	<div class="clear"></div>
	      	<div id="bollymyCarousel" class="carousel slide" data-ride="carousel">
	      		<div class="carousel-inner">
	      			<?php
	      			foreach ($latest_bollywood_homepage_data as $latest_bollywood_key => $latest_bollywood_data) {

	      			if(!empty($latest_bollywood_data['News']['images'])){
						$latest_bollywood_images = explode(',', $latest_bollywood_data['News']['images']);
						$gallery_main_bollywood = $latest_bollywood_images[0];
					} else {
						$gallery_main_bollywood = DEFAULT_URL.'img/new-default.png';
					}
	      			?>
	      			<div class="item <?php if($latest_bollywood_key == 0){ ?>active<?php } ?> news-b">
	      				<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_bollywood_data['News']['cat_slug'].'/'.$latest_bollywood_data['News']['slug']?>"><img src="<?=$gallery_main_bollywood?>" alt="<?=$latest_bollywood_data['News']['title']?>" /></a>
	      				<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_bollywood_data['News']['cat_slug'].'/'.$latest_bollywood_data['News']['slug']?>"><h3><?php echo mb_substr($latest_bollywood_data['News']['title'], 0, 80); ?></h3></a>
	      			</div>
	      			<?php
	      			}
	      			?>
				</div>
				<a class="left carousel-control" href="#bollymyCarousel" data-slide="prev">
					<span class="glyphicon-chevron-left"><img src="<?=DEFAULT_URL?>img/prev-arrow.png" alt="arrow"></span>
				</a>
				<a class="right carousel-control" href="#bollymyCarousel" data-slide="next">
					<span class="glyphicon-chevron-right"><img src="<?=DEFAULT_URL?>img/left-arrow.png" alt="arrow"></span>
				</a>
			</div>		  
           	<div class="clear"></div>
           	<?php } ?>
           	<?php
			if(count($latest_columns_homepage_data) > 0){
			$last_columns_num = count($latest_columns_homepage_data)-1;
			?>
		   	<div class="column"> <!-- column start -->
			  	<a href="<?php echo $this->Common->get_listing_url(8); ?>"><h2 class="main-title magenta-blue">Writers Column </h2></a>
			  	<span class="magenta-blue-border"></span>
			  	<div class="clear"></div> 
			    <div class="row">
					<?php
	      			foreach ($latest_columns_homepage_data as $latest_columns_key => $latest_columns_data) {

	      			if(!empty($latest_columns_data['News']['images'])){
						$latest_columns_images = explode(',', $latest_columns_data['News']['images']);
						$gallery_main_columns = $latest_columns_images[0];
					} else {
						$gallery_main_columns = DEFAULT_URL.'img/new-default.png';
					}
	      			?>
					<div class="column-b">
						<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_columns_data['News']['cat_slug'].'/'.$latest_columns_data['News']['slug']?>"><img src="<?=$gallery_main_columns?>" alt="<?=$latest_columns_data['News']['title']?>" /></a>
						<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_columns_data['News']['cat_slug'].'/'.$latest_columns_data['News']['slug']?>"><h3><?php echo mb_substr($latest_columns_data['News']['title'], 0, 80); ?></h3></a>
					</div>
					<?php
					}
					?>	 
				</div>	    
			   	<div class="clear"></div>
	      	</div> <!-- column end -->
	      	<?php } ?>
	   	</div> <!-- left-part end -->
	  	<div class="right-part"> <!-- right-part start -->
	        <?php
			if(count($latest_india_homepage_data) > 0){
			$last_india_num = count($latest_india_homepage_data)-1;
			?>
	        <a href="<?php echo $this->Common->get_listing_url(2); ?>"><h2 class="main-title violet">India</h2></a>
		    <span class="violet-border"></span>
	        <div class="clear"></div> 
	          	<div class="gray-bg">
				   	<?php
	      			foreach ($latest_india_homepage_data as $latest_india_key => $latest_india_data) {

	      			if(!empty($latest_india_data['News']['images'])){
						$latest_india_images = explode(',', $latest_india_data['News']['images']);
						$gallery_main_india = $latest_india_images[0];
					} else {
						$gallery_main_india = DEFAULT_URL.'img/new-default.png';
					}
	      			?>
				   	<div class="grid-listing">
						<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_india_data['News']['cat_slug'].'/'.$latest_india_data['News']['slug']?>"><img src="<?=$gallery_main_india?>" alt="" /></a>
						<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_india_data['News']['cat_slug'].'/'.$latest_india_data['News']['slug']?>"><h3><?php echo mb_substr($latest_india_data['News']['title'], 0, 80); ?></h3></a>
				   	</div>
				   	<?php
				   	}
				   	?> 
		      	</div>
           	<div class="clear"></div>
           	<?php } ?>	
	   	</div> <!-- right-part end -->  
	    <div class="clear"></div>
	</div>
</section> <!-- sec-part6 end -->

<?php
echo $this->element('frontfooter');
?>