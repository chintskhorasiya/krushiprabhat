<?php
echo $this->element('frontheader');
?>
<div class="breadcrumb">
	<div class="container">
		<section class="article-breadcrumb">
			<?php
			$category_breadcrumb = '<span class="br-arrow">» </span> <a href="'.DEFAULT_FRONT_EPAPERS_URL.'">E-Paper</a> <span class="br-arrow">» '.$category_name;
			?>
			<a href="<?=DEFAULT_URL?>" title="Home"> Home</a><?=$category_breadcrumb;?>
		</section>
	</div>
</div>
<section class="main epaper-page"> <!-- sec-part1 start -->
   	<div class="container"> 
	   	<div class="inner-page">
	   		<h1 class="inner-title">E-Paper Listings</h1>
	   		<div class="e-paper-listing">
	   			<?php
	   			if(count($epapers_data) > 0){
	   				foreach ($epapers_data as $epaper_key => $epaper_data) {
	   					?>
	   					<div class="news-b">
			   				<a target="_blank" href="<?=$epaper_data['Epaper']['epaper']?>"><img src="<?=$category_image?>" alt=""></a>
			   				<a target="_blank" href="<?=$epaper_data['Epaper']['epaper']?>"><h3><?=$epaper_data['Epaper']['title']?></h3></a>
			   			</div>
	   					<?php
	   				}
	   			}
	   			?>
	   		</div>
		</div>
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
   </div>
</section> <!-- sec-part1 end -->
<?php
echo $this->element('frontfooter');
?>