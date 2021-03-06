<?php
echo $this->element('frontheader');
?>
<div class="left-part"> <!-- left-part start -->
	<section class="main sec-part1"> <!-- sec-part1 start -->
		<a href="<?php echo $this->Common->get_listing_url(9); ?>"><h2 class="main-title">Top Story</h2></a>
		<style>
	    .owl-video-wrapper .owl-video-tn{min-height: 450px !important;}
		</style>
		<div class="sec-part1-left">
			<div class="owl-carousel owl-theme top-carousel">
					<?php
					$youtube_regex_pattern = "/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/";
					$match;

					// for home page latest news slider
					if(count($latest_news_gallery_data) > 0){
						foreach ($latest_news_gallery_data as $latest_news_num => $latest_news_data) {
							if(!empty($latest_news_data['News']['title'])){
								if($latest_news_num == "0"){
									echo '<div class="item active news-b1">';
								} else{
									echo '<div class="item news-b1">';
								}

								$video_main = false;
								if(!empty($latest_news_data['News']['videos'])){
									
									$videos_arr = explode(',', $latest_news_data['News']['videos']);
									$video_post = $videos_arr[0];
									if(preg_match($youtube_regex_pattern, $video_post, $match))
									{
										$video_main = $match[4];	
									}
								}

								if(empty($video_main))
								{
									if(!empty($latest_news_data['News']['images'])){
										$latest_news_images = explode(',', $latest_news_data['News']['images']);
										$gallery_main = $latest_news_images[0];
									} else {
										$gallery_main = DEFAULT_URL.'img/new-default.png';
									}
								}

								if($video_main)
								{
									echo '<a href="'.DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_data['News']['cat_slug'].'/'.$latest_news_data['News']['slug'].'"><a class="owl-video" href="https://www.youtube.com/watch?v='.$video_main.'"></a></a>';
								}
								else
								{
									echo '<a href="'.DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_data['News']['cat_slug'].'/'.$latest_news_data['News']['slug'].'"><img src="'.$gallery_main.'" alt="'.$latest_news_data['News']['title'].'" /></a>';
								}


								echo '<a href="'.DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_data['News']['cat_slug'].'/'.$latest_news_data['News']['slug'].'"><h3>'.mb_substr($latest_news_data['News']['title'], 0, 50).'</h3></a>';
								echo '</div>';
							}
						}
					}
					?>
			</div>
		</div>
		<div class="sec-part1-grey">
			<?php
          	if(!empty($latest_news_4th_data)){
          		?>
          		<div class="news-b1">
          			<?php
          			if(!empty($latest_news_4th_data['News']['images'])){
						$latest_news_images = explode(',', $latest_news_4th_data['News']['images']);
						$gallery_main = $latest_news_images[0];
					} else {
						$gallery_main = DEFAULT_URL.'img/new-default.png';
					}
					?>
                	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_4th_data['News']['cat_slug'].'/'.$latest_news_4th_data['News']['slug']?>"><img src="<?php echo $gallery_main; ?>" alt="<?php echo $latest_news_4th_data['News']['title']; ?>" /></a>
					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_4th_data['News']['cat_slug'].'/'.$latest_news_4th_data['News']['slug']?>"><h3><?php echo mb_substr($latest_news_4th_data['News']['title'], 0, 50); ?></h3></a>
              	</div>	
              	<?php
          	}
          	?>
          	<?php
          	if(!empty($latest_news_5th_data)){
          		?>
          		<div class="news-b1">
          			<?php
          			if(!empty($latest_news_5th_data['News']['images'])){
						$latest_news5_images = explode(',', $latest_news_5th_data['News']['images']);
						$gallery_main_5 = $latest_news5_images[0];
					} else {
						$gallery_main_5 = DEFAULT_URL.'img/new-default.png';
					}
					?>
                	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_5th_data['News']['cat_slug'].'/'.$latest_news_5th_data['News']['slug']?>"><img src="<?php echo $gallery_main_5; ?>" alt="<?php echo $latest_news_5th_data['News']['title']; ?>" /></a>
					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_5th_data['News']['cat_slug'].'/'.$latest_news_5th_data['News']['slug']?>"><h3><?php echo mb_substr($latest_news_5th_data['News']['title'], 0, 50); ?></h3></a>
              	</div>	
              	<?php
          	}
          	?>
			<?php
          	if(!empty($latest_news_6th_data)){
          		?>
          		<div class="news-b1">
          			<?php
          			if(!empty($latest_news_6th_data['News']['images'])){
						$latest_news5_images = explode(',', $latest_news_6th_data['News']['images']);
						$gallery_main_5 = $latest_news5_images[0];
					} else {
						$gallery_main_5 = DEFAULT_URL.'img/new-default.png';
					}
					?>
                	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_6th_data['News']['cat_slug'].'/'.$latest_news_6th_data['News']['slug']?>"><img src="<?php echo $gallery_main_5; ?>" alt="<?php echo $latest_news_6th_data['News']['title']; ?>" /></a>
					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_news_6th_data['News']['cat_slug'].'/'.$latest_news_6th_data['News']['slug']?>"><h3><?php echo mb_substr($latest_news_6th_data['News']['title'], 0, 50); ?></h3></a>
              	</div>	
              	<?php
          	}
          	?>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</section> <!-- sec-part1 end -->

	<div class="clear"></div>

	<section class="main sec-part2"> <!-- sec-part2 start -->  
	   	<?php
	   	if(count($latest_samachar_homepage_data) > 0) {
	   	?>
	   	<div class="sec-part2-col1">
	      	<a href="<?php echo $this->Common->get_listing_url(1); ?>"><h2 class="main-title">સમાચાર</h2></a>
          	<div class="clear"></div> 
          	<?php
		   	foreach ($latest_samachar_homepage_data as $latest_samachar_num => $latest_samachar_data)
		   	{
			   	if($latest_samachar_num == 0){
			   		echo '<div class="news-b">';
			   	} else {
					echo '<div class="grid-listing">';		   		
			   	}

			   	if(!empty($latest_samachar_data['News']['images'])){
					$latest_samachar_images = explode(',', $latest_samachar_data['News']['images']);
					$gallery_main_sama = $latest_samachar_images[0];
				} else {
					$gallery_main_sama = DEFAULT_URL.'img/new-default.png';
				}
		   		?>
            	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_samachar_data['News']['cat_slug'].'/'.$latest_samachar_data['News']['slug']?>"><img src="<?=$gallery_main_sama?>" alt="<?php echo $latest_samachar_data['News']['title']; ?>" /></a>
				<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_samachar_data['News']['cat_slug'].'/'.$latest_samachar_data['News']['slug']?>"><h3><?php echo mb_substr($latest_samachar_data['News']['title'], 0, 80); ?></h3></a>
          		</div>
          		<?php
          	}
          	?>
	   	</div>
	   	<?php
	   	}
	   	?>
       	<?php
	   	if(count($latest_margdarshan_homepage_data) > 0) {
	   	?>
       	<div class="sec-part2-col2">
	      	<a href="<?php echo $this->Common->get_listing_url(2); ?>"><h2 class="main-title">માર્ગદર્શન</h2></a>
          	<div class="clear"></div> 
	      	<ul class="list">
		     	<?php
			   	foreach ($latest_margdarshan_homepage_data as $latest_margdarshan_num => $latest_margdarshan_data)
			   	{
			   	?>
		     		<li>
		     			<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_margdarshan_data['News']['cat_slug'].'/'.$latest_margdarshan_data['News']['slug']?>"><?php echo mb_substr($latest_margdarshan_data['News']['title'], 0, 80); ?>
		     			</a>
		     		</li>
		     	<?php
		     	}
		     	?>
		  	</ul>
	   	</div>
	   	<?php
	   	}
	   	?>
	    <div class="clear"></div> 
    </section> <!-- sec-part2 end -->	
     

    <?php
   	if(count($latest_samadhan_homepage_data) > 0) {

   	$total_samadhan_data = count($latest_samadhan_homepage_data);
   	?>
    <section class="main sec-part3"> <!-- sec-part3 start -->  
      	<a href="<?php echo $this->Common->get_listing_url(3); ?>"><h2 class="main-title">સમાધાન</h2></a> 
      	<div class="clear"></div>
	  	<?php
	   	foreach ($latest_samadhan_homepage_data as $latest_samadhan_num => $latest_samadhan_data)
	   	{

	   		if(!empty($latest_samadhan_data['News']['images'])){
				$latest_samadhan_images = explode(',', $latest_samadhan_data['News']['images']);
				$gallery_main_samad = $latest_samadhan_images[0];
			} else {
				$gallery_main_samad = DEFAULT_URL.'img/new-default.png';
			}
	   	?>
	   	<?php if($latest_samadhan_num == 0){ ?>
	  	<div class="sec-part3-col1">
		   	<div class="col-md-6">
			 	<div class="news-b1">
					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_samadhan_data['News']['cat_slug'].'/'.$latest_samadhan_data['News']['slug']?>"><img src="<?=$gallery_main_samad?>" alt="" /></a>
			  	</div> 
		   	</div>
		   	<div class="col-md-6">  
				<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_samadhan_data['News']['cat_slug'].'/'.$latest_samadhan_data['News']['slug']?>"><h3><?php echo mb_substr($latest_samadhan_data['News']['title'], 0, 50); ?></h3></a>
				<div class="news-desc" style="word-wrap: break-word;">
					<?php echo mb_substr($latest_samadhan_data['News']['content'], 0, 610); ?>
				</div>
          	</div>
		  	<div class="clear"></div> 
	  	</div>
	  	<?php } else { ?>
	  	<?php if($latest_samadhan_num == 1){ ?><div class="sec-part3-col2"><?php } ?>
           	<div class="grid-listing">
	        	<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_samadhan_data['News']['cat_slug'].'/'.$latest_samadhan_data['News']['slug']?>"><img src="<?=$gallery_main_samad?>" alt="" /></a>
				<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_samadhan_data['News']['cat_slug'].'/'.$latest_samadhan_data['News']['slug']?>"><h3><?php echo mb_substr($latest_samadhan_data['News']['title'], 0, 40); ?></h3></a>
		   	</div>
	  	<?php if($latest_samadhan_num == $total_samadhan_data){ ?> <div class="clear"></div></div> <?php } ?>
	  	<?php
	  	}
	  	}
	  	?>
		<div class="clear"></div> 
   	</section> <!-- sec-part3 end -->
   	<?php
   	}
   	?>
       
    <?php
    if(count($latest_vicharmanch_homepage_data) > 0){
    ?>
    <div class="column"> <!-- column start -->
	  	<a href="<?php echo $this->Common->get_listing_url(4); ?>"><h2 class="main-title">વિચાર મંચ</h2></a>
	  	<div class="clear"></div> 
     	<div class="row">
		  	<?php
		   	foreach ($latest_vicharmanch_homepage_data as $latest_vicharmanch_num => $latest_vicharmanch_data)
		   	{

		   		if(!empty($latest_vicharmanch_data['News']['images'])){
					$latest_vicharmanch_images = explode(',', $latest_vicharmanch_data['News']['images']);
					$gallery_main_vichar = $latest_vicharmanch_images[0];
				} else {
					$gallery_main_vichar = DEFAULT_URL.'img/new-default.png';
				}
		   	?>
			  	<div class="column-b">
					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_vicharmanch_data['News']['cat_slug'].'/'.$latest_vicharmanch_data['News']['slug']?>"><img src="<?=$gallery_main_vichar?>" alt="" /></a>
					<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_vicharmanch_data['News']['cat_slug'].'/'.$latest_vicharmanch_data['News']['slug']?>"><h3><?php echo mb_substr($latest_vicharmanch_data['News']['title'], 0, 60); ?></h3></a>
		            <div class="news-desc">
		            	<?php echo mb_substr($latest_vicharmanch_data['News']['content'], 0, 250); ?>
		            </div>
			   	</div>
		   	<?php
		   	}
		   	?>
		</div>
		<div class="clear"></div>
	</div> <!-- column end -->
	<?php
   	}
   	?>

</div> <!-- left-part end -->

<div class="right-part"> <!-- right-part start -->

	<?php
   	if(count($latest_prerna_homepage_data) > 0) {
   	?>
   	<div class="hot-news">
      	<a href="<?php echo $this->Common->get_listing_url(5); ?>"><h2 class="main-title">પ્રેરણા</h2></a>
      	<ul>
	     	<?php
		   	foreach ($latest_prerna_homepage_data as $latest_prerna_num => $latest_prerna_data)
		   	{
		   	?>
	     		<li>
	     			<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_prerna_data['News']['cat_slug'].'/'.$latest_prerna_data['News']['slug']?>"><?php echo mb_substr($latest_prerna_data['News']['title'], 0, 80); ?>
	     			</a>
	     		</li>
	     	<?php
	     	}
	     	?>
	  	</ul>
   	</div>
   	<?php
   	}
   	?>  
			
	<?php
  	if($ads_home_rightbar_first_data)
  	{
  		if(!empty($ads_home_rightbar_first_data['Advertise']['source'])){
  		?>
  		<div class="adv2"><a target="_blank" href="<?=$ads_home_rightbar_first_data['Advertise']['link']?>"><img src="<?=$ads_home_rightbar_first_data['Advertise']['source']?>" alt="<?=$ads_home_rightbar_first_data['Advertise']['title']?>" /></a></div>
  		<?php
  		}
  	}
  	?> 	

	<!--<div class="home-online-pol-old" style="display:none">
		<a href="<?=DEFAULT_URL?>polls"><h2 class="main-title">Online Poll</h2></a>
		<?php
        if(!empty($_SESSION['vote_success_msg'])){
            ?>
            <div class="alert alert-success" id="#vote_success">
                <?php echo $_SESSION['vote_success_msg'];unset($_SESSION['vote_success_msg']); ?>
            </div>
            <?php
        }
        ?>
		<div class="home-poll">
			<h3><?php echo mb_substr($latest_poll_homepage_data['Poll']['question'], 0, 100); ?></h3>
			<form action="<?=DEFAULT_URL?>pollsubmit" method="post" enctype="multipart/form-data">
				<input name="poll_answer" id="poll_answer" type="radio" value="1"><?php echo $latest_poll_homepage_data['Poll']['answer1']; ?><br>
				<input name="poll_answer" id="poll_answer" type="radio" value="2"><?php echo $latest_poll_homepage_data['Poll']['answer2']; ?><br>
				<input type="hidden" name="poll_id" id="poll_id" value="<?php echo $latest_poll_homepage_data['Poll']['id']; ?>" />
				<input type="hidden" name="redirect_url" id="redirect_url" value="<?php echo DEFAULT_URL.'#vote_success'; ?>" />
				<input class="buton vote-btn" data-poll="<?php echo $latest_poll_homepage_data['Poll']['id']; ?>" type="submit" value="Vote" style="">
			</form>
		</div>
	</div>-->

	<div class="home-online-pol">
		<h2 class="main-title">Online Poll</h2>
		<div class="owl-carousel owl-theme poll-carousel">
		<?php
		if(count($latest_polls_homepage_data) > 0){
			foreach ($latest_polls_homepage_data as $poll_num => $latest_poll_homepage_data) {
				?>
				<div class="home-poll item">
					<h3><?php echo mb_substr($latest_poll_homepage_data['Poll']['question'], 0, 100); ?></h3>
					<form action="<?=DEFAULT_URL?>pollsubmit" method="post" enctype="multipart/form-data">
						<input name="poll_answer" id="poll_answer_<?php echo $latest_poll_homepage_data['Poll']['id']; ?>" type="radio" value="1"><?php echo $latest_poll_homepage_data['Poll']['answer1']; ?><br>
						<input name="poll_answer" id="poll_answer_<?php echo $latest_poll_homepage_data['Poll']['id']; ?>" type="radio" value="2"><?php echo $latest_poll_homepage_data['Poll']['answer2']; ?><br>
						<input class="buton vote-btn" data-poll="<?php echo $latest_poll_homepage_data['Poll']['id']; ?>" type="button" value="Vote" style="">
					</form>
				</div>
				<?php
			}
		}
		?>
		</div>
	</div>

	<div class="commo-market-widget">
		<h2 class="main-title">Commodity Market</h2>
		<iframe frameborder="0" src="http://www.indianotes.com/widgets/currency-prices/index.php?type=all-currency-prices&w=300&h=200" width="300" height="200" scrolling="no"></iframe>
	</div>

	<?php
	if(count($latest_gauseva_homepage_data) > 0)
	{
	?>
	<a href="<?php echo $this->Common->get_listing_url(6); ?>"><h2 class="main-title">ગૌ સેવા</h2></a>
	<div class="clear"></div>
	<div id="PressmyCarousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<?php
			foreach($latest_gauseva_homepage_data as $latest_gauseva_key => $latest_gauseva_data) {

				if(!empty($latest_gauseva_data['News']['images'])){
					$latest_gauseva_images = explode(',', $latest_gauseva_data['News']['images']);
					$gallery_main_gauseva = $latest_gauseva_images[0];
				} else {
					$gallery_main_gauseva = DEFAULT_URL.'img/new-default.png';
				}
			?>
			<div class="item <?php if($latest_gauseva_key == 0) { echo 'active'; } ?> news-b">
				<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_gauseva_data['News']['cat_slug'].'/'.$latest_gauseva_data['News']['slug']?>"><img src="<?=$gallery_main_gauseva?>" alt="" /></a>
				<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_gauseva_data['News']['cat_slug'].'/'.$latest_gauseva_data['News']['slug']?>"><h3><?php echo mb_substr($latest_gauseva_data['News']['title'], 0, 80); ?></h3></a>
			</div>
			<?php
			}
			?>
		</div>
		<a class="left carousel-control" href="#PressmyCarousel" data-slide="prev">
			<span class="glyphicon-chevron-left"><img src="<?=DEFAULT_URL?>img/prev-arrow.png" alt="arrow"></span>
		</a>
		<a class="right carousel-control" href="#PressmyCarousel" data-slide="next">
			<span class="glyphicon-chevron-right"><img src="<?=DEFAULT_URL?>img/left-arrow.png" alt="arrow"></span>
		</a>
	</div>
	<?php
	}	
	?>

	<div class="clear"></div>
	
	<?php
	if (count($latest_levench_homepage_data) > 0) {
	?>
	<a href="<?php echo $this->Common->get_listing_url(8); ?>"><h2 class="main-title">લેં-વેંચ</h2></a>
	<div class="clear"></div> 
   	<div class="gray-bg">
	   	<?php
	   	foreach ($latest_levench_homepage_data as $latest_levench_key => $latest_levench_data) {

	   		if(!empty($latest_levench_data['News']['images'])){
				$latest_levench_images = explode(',', $latest_levench_data['News']['images']);
				$gallery_main_levench = $latest_levench_images[0];
			} else {
				$gallery_main_levench = DEFAULT_URL.'img/new-default.png';
			}
	   	?>
	   	<div class="grid-listing">
			<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_levench_data['News']['cat_slug'].'/'.$latest_levench_data['News']['slug']?>"><img src="<?=$gallery_main_levench?>" alt="" /></a>
			<a href="<?=DEFAULT_FRONT_NEWS_DETAIL_URL.$latest_levench_data['News']['cat_slug'].'/'.$latest_levench_data['News']['slug']?>"><h3><?php echo mb_substr($latest_levench_data['News']['title'], 0, 80); ?></h3></a>
	   	</div>
	   	<?php
	   	}
	   	?> 
  	</div>

  	<?php } ?>
	<div class="clear"></div>

</div> <!-- right-part end -->

<div class="clear"></div>

<?php
  	if($ads_home_footer_bottom_data)
  	{
  		if(!empty($ads_home_footer_bottom_data['Advertise']['source'])){
  		?>
  		<div class="adv6"><a target="_blank" href="<?=$ads_home_footer_bottom_data['Advertise']['link']?>"><img src="<?=$ads_home_footer_bottom_data['Advertise']['source']?>" alt="<?=$ads_home_footer_bottom_data['Advertise']['title']?>" /></a></div>
  		<?php
  		}
  	}
  	?> 	
<script type="text/javascript">
	jQuery('.vote-btn').click(function(){
		var pollID = jQuery(this).attr('data-poll');
		//alert(pollID);
		//console.log(pollID);
		var selectedAnswer = jQuery('#poll_answer_'+pollID+':checked').val();
		//alert(selectedAnswer);
		//console.log(selectedAnswer);
		var jqxhr = $.ajax({
		  method: "POST",
		  url: "<?=DEFAULT_URL?>pollsubmit",
		  data: { poll_answer: selectedAnswer, poll_id: pollID }
		})
	  	.done(function(data) {
	  		//console.log(data);
	    	if(data == "success"){
	    		jQuery('.poll-carousel').before('<div class="alert alert-dismissable alert-success" role="alert" id="#vote_success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Thanks for voting.</strong></div>');
	    	} else {
	    		jQuery('.poll-carousel').before('<div class="alert alert-dismissable alert-danger" role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Something went wrong.</strong></div>');
	    	}
	  	})
	  	.fail(function(data) {
	  		//console.log(data);
	    	jQuery('.poll-carousel').before('<div class="alert alert-dismissable alert-danger" role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Something went wrong.</strong></div>');
	  	});
	});

	$(document).ready(function() {
      var poll = $('.poll-carousel');
      poll.owlCarousel({
        margin: 10,
        nav: true,
        loop: true,
        //autoHeight:true,
        autoplay:false,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        video:true,
        lazyLoad:true,
        center:true,
        dots: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      })

      var top = $('.top-carousel');
      top.owlCarousel({
        margin: 10,
        nav: true,
        loop: true,
        autoHeight:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        video:true,
        lazyLoad:true,
        center:true,
        dots: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      })
    });
</script>
<?php
echo $this->element('frontfooter');
?>