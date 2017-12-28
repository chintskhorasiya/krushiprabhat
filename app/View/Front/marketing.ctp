<?php
echo $this->element('frontheader');
?>
<div class="breadcrumb">
	<section class="article-breadcrumb">
			<a href="<?=DEFAULT_URL?>" title="Home"> Home</a><span class="br-arrow">» </span><?php echo $marketing_page_title; ?>
	</section>
</div>
<div class="inner-page">
	<h1 class="inner-title"><?=$marketing_page_title?></h1>
	<?php //echo $cms_page_content; ?>
	<style type="text/css">
	#commo-div
	{
	    width    : 100%;
	    height   : 150px;
	    overflow : hidden;
	    position : relative;
	}
	#commo-iframe
	{
	    position : absolute;
	    top      : -150px;
	    left     : -40px;
	    width    : 1280px;
	    height   : 1200px;
	}
	</style>
	<div id="commo-div">
		<iframe src="http://ecommodityworld.com" id="commo-iframe" scrolling="no"></iframe>
	</div>
</div>
<?php
echo $this->element('frontfooter');
?>