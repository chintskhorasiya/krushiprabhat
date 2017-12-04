<?php
echo $this->element('frontheader');
?>
<div class="breadcrumb">
	<div class="container">
		<section class="article-breadcrumb">
			<a href="<?=DEFAULT_URL?>" title="Home"> Home</a><span class="br-arrow">» </span><?php echo $cms_page_title; ?>
		</section>
		<section class="main "> <!-- sec-part1 start -->
		   	<div class="container"> 
			    <div class="inner-page">
			    	<h1 class="inner-title"><?=$cms_page_title?></h1>
			    	<?php echo $cms_page_content; ?>
				</div>		
				<div class="clear"></div> 
		   	</div>
		</section>
	</div>
  </div>
<?php
echo $this->element('frontfooter');
?>