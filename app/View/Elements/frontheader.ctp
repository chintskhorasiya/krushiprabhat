<div class="container">
 <header class="header"> <!-- header start --> 
      <div class="top-header"> <!-- top header start --> 
		  <div class="search-box">
		      <form action="">
				<input type="text" name="search" placeholder="search"> 
			  </form>
		  </div>  
		 <div class="social">
			 <a href="#" target="_blank"><img src="<?=DEFAULT_URL?>img/facebook.png" alt="facebook" /></a>
			 <a href="#" target="_blank"><img src="<?=DEFAULT_URL?>img/twitter.png" alt="twitter" /></a>
			 <a href="#" target="_blank"><img src="<?=DEFAULT_URL?>img/you-tube.png" alt="you-tube" /></a>
			 <a href="#" target="_blank"><img src="<?=DEFAULT_URL?>img/google.png" alt="google" /></a>
		 </div> 
		 <div class="clear"></div>
      </div> <!-- top header end -->
	   
      <div class="logo-header"> <!-- logo header start --> 
	      <div class="logo"><a href="<?=DEFAULT_URL?>"><img src="<?=DEFAULT_URL?>img/logo.png" alt="logo" /></a></div>
 		  	
 		  	<?php
		  	if($ads_home_top_right_data)
		  	{
		  		if(!empty($ads_home_top_right_data['Advertise']['source'])){
		  		?>
		  		<div class="adv1"><a target="_blank" href="<?=$ads_home_top_right_data['Advertise']['link']?>"><img src="<?=$ads_home_top_right_data['Advertise']['source']?>" alt="<?=$ads_home_top_right_data['Advertise']['title']?>" /></a></div>
		  		<?php
		  		}
		  	}
		  	?> 

		   <div class="clear"></div>

		   	<ul class="logo-menu">  
			 <li><a href="#">લાઈવ ટીવી</a></li>
			 <li><a href="#">વિડીયો</a></li>
			 <li><a href="#">ફોટો ગેલેરી</a></li> 
			</ul> 
           
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
				<li class="active home-menu"><a href="<?=DEFAULT_URL?>"><img src="<?=DEFAULT_URL?>img/home-icon.png" alt="home" /></a></li>
				<?php
		  		foreach ($header_cate_menus_data as $newscate_key => $newscate_data) {
		  			?>
		  			<li><a href="<?=DEFAULT_FRONT_NEWS_CATEGORY_URL.$newscate_data['NewsCategory']['slug']?>"><?=$newscate_data['NewsCategory']['name'];?></a></li>
		  			<?php	
		  		}
		  		?> 
			</ul>
		</nav>
      </div>  <!-- menu-header end -->	   
 </header> <!-- header end -->