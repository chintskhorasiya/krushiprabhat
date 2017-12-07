<?php
echo $this->element('frontheader');
?>
<div class="breadcrumb">
	<section class="article-breadcrumb">
		<?php
		$category_breadcrumb = '<span class="br-arrow">» </span> Videos';
		?>
		<a href="<?=DEFAULT_URL?>" title="Home"> Home</a><?=$category_breadcrumb;?>
	</section>
</div>
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

<div class="right-part inner-right"> <!-- right-part start -->
	<?php
  	if($ads_category_page_rightbar_data)
  	{
  		if(!empty($ads_category_page_rightbar_data['Advertise']['source'])){
  		?>
  		<div class="adv1"><a target="_blank" href="<?=$ads_category_page_rightbar_data['Advertise']['link']?>"><img src="<?=$ads_category_page_rightbar_data['Advertise']['source']?>" alt="<?=$ads_category_page_rightbar_data['Advertise']['title']?>" /></a></div>
  		<?php
  		}
  	}
  	?> 

	<h2 class="main-title">Commodity Market</h2>
	<iframe frameborder="0" src="http://www.indianotes.com/widgets/currency-prices/index.php?type=all-currency-prices&w=300&h=200" width="300" height="200" scrolling="no"></iframe>

	<a href="<?php echo $this->Common->get_listing_url(6); ?>"><h2 class="main-title">ગૌ સેવા</h2></a>
	<div class="clear"></div>
	<div id="PressmyCarousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
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
       				<div class="item <?php if($sidebarupr_key == 0){ echo 'active'; } ?> news-b">
       					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$sidebarupr_data['News']['cat_slug'].'/'.$sidebarupr_data['News']['slug']?>"><img src="<?=$sidebarupr_image?>" alt="" /></a>
       					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$sidebarupr_data['News']['cat_slug'].'/'.$sidebarupr_data['News']['slug']?>"><h3><?php echo mb_substr($sidebarupr_data['News']['title'], 0, 80); ?></h3></a>
       				</div>
       			<?php
       			}
       		}
       		?>
		</div>			
		<a class="left carousel-control" href="#PressmyCarousel" data-slide="prev">
		   <span class="glyphicon-chevron-left"><img src="images/prev-arrow.png" alt="arrow"></span>
		</a>
		<a class="right carousel-control" href="#PressmyCarousel" data-slide="next">
		    <span class="glyphicon-chevron-right"><img src="images/left-arrow.png" alt="arrow"></span>
		</a>
	</div>
	<div class="clear"></div>
		   
	<a href="<?php echo $this->Common->get_listing_url(8); ?>"><h2 class="main-title">લેં-વેંચ</h2></a>
    <div class="clear"></div> 
   	<div class="gray-bg">
	   	<?php
   		if(count($news_page_sidebardown) > 0){
   		
   			foreach ($news_page_sidebardown as $sidebardown_key => $sidebardown_data) {
   				if(!empty($sidebardown_data['News']['images'])){
					$sidebardown_images = explode(',', $sidebardown_data['News']['images']);
					$sidebardown_image = $sidebardown_images[0];
				} else {
					$sidebardown_image = DEFAULT_URL.'img/new-default.png';
				}
   			?>
   				<div class="grid-listing">
   					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$sidebardown_data['News']['cat_slug'].'/'.$sidebardown_data['News']['slug']?>"><img src="<?=$sidebardown_image?>" alt="" /></a>
   					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$sidebardown_data['News']['cat_slug'].'/'.$sidebardown_data['News']['slug']?>"><h3><?php echo mb_substr($sidebardown_data['News']['title'], 0, 80); ?></h3></a>
   				</div>
   			<?php
   			}
   		}
   		?>
  	</div>
  	<div class="clear"></div>
</div> <!-- right-part end -->  

<div class="clear"></div>
<?php
echo $this->element('frontfooter');
?>