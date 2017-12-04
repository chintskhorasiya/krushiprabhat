<?php
echo $this->element('frontheader');
?>
<div class="breadcrumb">
	<div class="container">
		<section class="article-breadcrumb">
			<?php
			$category_breadcrumb = '<span class="br-arrow">» </span> Videos';
			?>
			<a href="<?=DEFAULT_URL?>" title="Home"> Home</a><?=$category_breadcrumb;?>
		</section>
	</div>
</div>
<section class="main listing-part"> <!-- sec-part1 start -->
   	<div class="container"> 
	   	<div class="left-part"> <!-- left-part start -->
	     	<div class="col-md-12 cat-list-grid">
	     	<?php
	     	if(count($videos_data) > 0)
	     	{
	     		$last_videos_count = count($videos_data)-1;
	     		foreach ($videos_data as $video_key => $video_data)
	     		{
	     		?>
	     		<div class="col-md-6">
	        		<a href="<?=DEFAULT_URL.'video/'.$video_data['Video']['slug']?>">
	        			<?php
	        			$youtube_regex_pattern = "/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/";
	        			$match;

            			if(preg_match($youtube_regex_pattern, $video_data['Video']['video'], $match)){
						    //echo "Youtube video id is: ".$match[4];
						    ?>
						    <!--<div class="youtube" id="<?=$match[4];?>" style="width: 100%; height: 250px;background-size: 100%;">
							</div>-->
							<img src="http://i.ytimg.com/vi/<?=$match[4];?>/hqdefault.jpg" alt="$video_data['Video']['title']" style="width: 100%; height: 250px;background-size: 100%;" />
						    <?php
						}else{
						    echo $video_data['Video']['title'];
						}
            			?>
	        			<h3><?php echo mb_substr($video_data['Video']['title'], 0, 80); ?></h3>
						<p>Click here to Watch Video</p>
					</a>
	         	</div>	
			  	<?php
	          	}
	          	?>
	          	<div class="clear"></div>
	          	<?php echo $this->Paginator->prev('« Previous', array('class' => 'btn btn-default'), null, 
                    array('class' => 'disabled')); ?>
	          	<!-- Shows the page numbers -->
                <?php echo $this->Paginator->numbers(); ?>
                <!-- Shows the next and previous links -->
                <?php echo $this->Paginator->next('Next »', array('class' => 'btn btn-default'), null,
                    array('class' => 'disabled')); ?> 
                <!-- prints X of Y, where X is current page and Y is number of pages -->
                <?php echo $this->Paginator->counter(); ?>
          	<?php
          	}
          	?>
          	</div>
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
			 
            <h2 class="main-title violet">Gujarat</h2>
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