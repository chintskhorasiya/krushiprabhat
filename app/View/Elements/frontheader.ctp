<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php echo $this->Html->css('frontstyle'); ?>
<header class="header"> <!-- header start -->
   	<div class="container">
      	<div class="top-header"> <!-- top header start -->
	     	<div class="e-paper">
		    	<a href="<?=DEFAULT_FRONT_EPAPERS_URL?>"><img src="<?=DEFAULT_URL?>img/e-paper.png" alt="" /></a>
		 	</div>
		  	<div class="search-box">
		  		<?php
		  		if($this->Session->read('front_search_news_key') != "" && $from_search)
				{
				   $search_key = $this->Session->read('front_search_news_key');
				}
				else
				{
				   $search_key = "";
				}
		  		?>
		      	<form action="<?=DEFAULT_FRONT_NEWS_SEARCH_RESULTS_URL?>" method="POST">
					<input type="text" name="search_query" id="search_query" value="<?=$search_key?>" placeholder="search">
			  	</form>
		  	</div>  
		 	<div class="social">
			 	<a href="<?=$social_data['facebook'];?>" target="_blank"><img src="<?=DEFAULT_URL?>img/facebook.png" alt="facebook" /></a>
			 	<a href="<?=$social_data['twitter'];?>" target="_blank"><img src="<?=DEFAULT_URL?>img/twitter.png" alt="twitter" /></a>
			 	<a href="<?=$social_data['youtube'];?>" target="_blank"><img src="<?=DEFAULT_URL?>img/you-tube.png" alt="you-tube" /></a>
			 	<a href="<?=$social_data['google'];?>" target="_blank"><img src="<?=DEFAULT_URL?>img/google.png" alt="google" /></a>
		 	</div>
		 	<div class="date-time"><p><?php echo date('D, d M Y H:i:s'); ?></p></div>
		 	<div class="clear"></div>
      	</div> <!-- top header end -->

      	<div class="logo-header"> <!-- logo header start --> 
 		  	<?php
 		  	if($ads_home_top_left_data)
 		  	{
 		  		if(!empty($ads_home_top_left_data['Advertise']['source'])){
 		  		?>
 		  		<div class="adv1"><a target="_blank" href="<?=$ads_home_top_left_data['Advertise']['link']?>"><img src="<?=$ads_home_top_left_data['Advertise']['source']?>" alt="<?=$ads_home_top_left_data['Advertise']['title']?>" /></a></div>
 		  		<?php
 		  		}
 		  	}
 		  	?>
		  	<div class="logo"><a href="<?=DEFAULT_URL?>"><img src="<?=DEFAULT_URL?>img/logo.png" alt="logo" /></a></div>
		  	<?php
 		  	if($ads_home_top_right_data)
 		  	{
 		  		if(!empty($ads_home_top_right_data['Advertise']['source'])){
 		  		?>
 		  		<div class="adv2"><a target="_blank" href="<?=$ads_home_top_right_data['Advertise']['link']?>"><img src="<?=$ads_home_top_right_data['Advertise']['source']?>" alt="<?=$ads_home_top_right_data['Advertise']['title']?>" /></a></div>
 		  		<?php
 		  		}
 		  	}
 		  	?> 
		   	<div class="clear"></div>
	  	</div> <!-- logo header end -->
	  
      	<div class="menu-header">  <!-- menu-header start -->
	    	<nav class="navbar navbar-inverse">
		    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		    		<span class="icon-bar"></span>
		    		<span class="icon-bar"></span>
		    		<span class="icon-bar"></span>
		    	</button>
			    <ul class="nav navbar-nav">
			    	<li class="active home-menu">
				  		<a href="<?=DEFAULT_URL?>"><img src="<?=DEFAULT_URL?>img/home-icon.png" alt="home" /></a>
				  	</li>
				  	<?php //var_dump($header_cate_menus_data); ?>
				  	<?php
				  	foreach ($header_cate_menus_data as $newscate_key => $newscate_data) {
				  		?>
				  		<li><a href="<?=DEFAULT_FRONT_NEWS_CATEGORY_URL.$newscate_data['NewsCategory']['slug']?>"><?=$newscate_data['NewsCategory']['name'];?></a></li>
				  		<?php	
				  	}
				  	?>
				  	<li><a href="<?=DEFAULT_URL.'videos'?>">Video</a></li>
				  	<li><a href="<?=DEFAULT_FRONT_EPAPERS_URL?>">Epaper</a></li>
				  	<!--<li><a href="#">Buy & Sell</a></li> -->
				</ul> 
			</nav>
      	</div>  <!-- menu-header end -->	  
   	</div>
</header> <!-- header end -->