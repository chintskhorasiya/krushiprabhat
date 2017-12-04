<?php
echo $this->element('frontheader');
?>
<div class="breadcrumb">
	<div class="container">
		<section class="article-breadcrumb">
			<?php
			if(!empty($category_title)){
				$category_breadcrumb = '<span class="br-arrow">» </span><a href="'.DEFAULT_URL.'news/'.$this->Common->get_cat_slug($category_id).'">'.$category_title.'</a>';	
			} else {
				$category_breadcrumb = '';
			}
			?>
			<a href="<?=DEFAULT_URL?>" title="Home"> Home</a><?=$category_breadcrumb;?>
		</section>
	</div>
</div>
<section class="main listing-part"> <!-- sec-part1 start -->
   	<div class="container"> 
	   	<div class="left-part"> <!-- left-part start -->
	     	<?php
	     	if(count($category_news_data) > 0)
	     	{
	     		$last_catenews_count = count($category_news_data)-1;
	     		foreach ($category_news_data as $cat_news_key => $cat_news_data)
	     		{
	     			if(!empty($cat_news_data['News']['images'])){
						$catenews_images = explode(',', $cat_news_data['News']['images']);
						$catenews_image = $catenews_images[0];
					} else {
						$catenews_image = DEFAULT_URL.'img/new-default.png';
					}
		     	if($cat_news_key == 0){
		     	?>
		     	<div class="col-md-5">
	            	<div id="listmyCarousel" class="carousel slide" data-ride="carousel"> 
						<div class="carousel-inner">
						  	<div class="news-b">
	  					      	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$cat_news_data['News']['cat_slug'].'/'.$cat_news_data['News']['slug']?>"><img src="<?=$catenews_image?>" alt="" /></a> 
						  	</div> 
						</div>  
					</div>
	         	</div>	
	         	<div class="col-md-7 list-dec">
			    	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$cat_news_data['News']['cat_slug'].'/'.$cat_news_data['News']['slug']?>"><h3><?php echo $cat_news_data['News']['title']; ?></h3></a>
	            	<?php echo mb_substr($cat_news_data['News']['content'], 0, 240); ?>
	         	</div>	
			  	<div class="clear"></div>
			  	<?php } ?>
			  	<?php
			  	$mid_count = 10;
			  	if($last_catenews_count < $mid_count) $mid_count = $last_catenews_count;
			  	?>
			  	<?php if($cat_news_key >= 1 && $cat_news_key <= $mid_count){ ?>
		          	<?php if($cat_news_key == 1){ ?><div class="col-md-12 cat-list-grid"><?php } ?>
				      	<div class="grid-listing grid-listing-left">
				        	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$cat_news_data['News']['cat_slug'].'/'.$cat_news_data['News']['slug']?>"><img src="<?=$catenews_image?>" alt="" /></a>
							<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$cat_news_data['News']['cat_slug'].'/'.$cat_news_data['News']['slug']?>"><h3><?php echo mb_substr($cat_news_data['News']['title'], 0, 80); ?></h3></a>
					   	</div>
					<?php if($cat_news_key == $mid_count){ ?>
					   	<div class="clear"></div> 
		          	</div> 
		          	<?php } ?>
			  	<?php } ?>
			  	<?php
			  	if($mid_count > 10){
			  	?>
				  	<?php if($cat_news_key >= 11 && $cat_news_key <= $last_catenews_count){ ?>
					  	<?php if($cat_news_key == 11){ ?><div class="cat-listing column"><?php } ?>
					  		<div class="column-b">
					  			<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$cat_news_data['News']['cat_slug'].'/'.$cat_news_data['News']['slug']?>"><img src="<?=$catenews_image?>" alt="" /></a>
					  			<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$cat_news_data['News']['cat_slug'].'/'.$cat_news_data['News']['slug']?>"><h3><?php echo mb_substr($cat_news_data['News']['title'], 0, 80); ?></h3></a>
					  		</div>
			            <?php if($cat_news_key == $last_catenews_count){ ?>
			            <div class="clear"></div>
			            </div>
			            <?php } ?>
		            <?php } ?>
	            <?php } ?> 		   
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
			 
            <a href="<?=DEFAULT_URL?>news/gujarat"><h2 class="main-title violet">Gujarat</h2></a>
		    <span class="violet-border"></span>
	        <div class="clear"></div>  
			<?php
       		if(count($news_page_sidebarupr) > 0){
       		
       			foreach ($news_page_sidebarupr as $sidebarupr_key => $sidebarupr_data) {
       				if(!empty($sidebarupr_data['News']['images'])){
						$sidebarupr_images = explode(',', $sidebarupr_data['News']['images']);
						$sidebarupr_image = $sidebarupr_images[0];
					} else {
						$sidebarupr_image = DEFAULT_URL.'img/new-default.png';
					}
       			?>
       				<div class="grid-listing">
       					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$sidebarupr_data['News']['cat_slug'].'/'.$sidebarupr_data['News']['slug']?>"><img src="<?=$sidebarupr_image?>" alt="" /></a>
       					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$sidebarupr_data['News']['cat_slug'].'/'.$sidebarupr_data['News']['slug']?>"><h3><?php echo mb_substr($sidebarupr_data['News']['title'], 0, 80); ?></h3></a>
       				</div>
       			<?php
       			}
       		}
       		?>
         	<?php
 		  	if($ads_category_page_rightbar_data)
 		  	{
 		  		if(!empty($ads_category_page_rightbar_data['Advertise']['source'])){
 		  		?>
 		  		<div class="adv5"><a target="_blank" href="<?=$ads_category_page_rightbar_data['Advertise']['link']?>"><img src="<?=$ads_category_page_rightbar_data['Advertise']['source']?>" alt="<?=$ads_category_page_rightbar_data['Advertise']['title']?>" /></a></div>
 		  		<?php
 		  		}
 		  	}
 		  	?> 	
            <br/>			 
	   	</div> <!-- right-part end -->  
	    <div class="clear"></div>
   </div>
 </section> <!-- sec-part1 end -->
<?php
echo $this->element('frontfooter');
?>