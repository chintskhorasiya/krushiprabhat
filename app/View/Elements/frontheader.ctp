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
	      <div class="logo"><a href="#"><img src="<?=DEFAULT_URL?>img/logo.png" alt="logo" /></a></div>
 		  <div class="adv1"><a href="#"><img src="<?=DEFAULT_URL?>img/adv1.jpg" alt="" /></a></div>  
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
				<li class="active home-menu"><a href="#"><img src="<?=DEFAULT_URL?>img/home-icon.png" alt="home" /></a></li>
				<?php
		  		foreach ($header_cate_menus_data as $newscate_key => $newscate_data) {
		  			?>
		  			<li><a href="<?=DEFAULT_FRONT_NEWS_CATEGORY_URL.$newscate_data['NewsCategory']['slug']?>"><?=$newscate_data['NewsCategory']['name'];?></a></li>
		  			<?php	
		  		}
		  		?>
			  	<li><a href="#">Gallery</a></li> 
			</ul> 
			<div class="live-tv"><a href="#"><img src="<?=DEFAULT_URL?>img/live-tv.jpg" alt="livetv" /></a></div>
		</nav>
      </div>  <!-- menu-header end -->	   
 </header> <!-- header end -->