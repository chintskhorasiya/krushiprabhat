<?php
App::uses('AppHelper', 'View/Helper');

class CommonHelper extends AppHelper {

    // Take advantage of other helpers
    public $helpers = array('Js', 'Html', 'Form');

    // Check if the tiny_mce.js file has been added or not
    public $_script = false;

    public function get_listing_url($category_id)
    {
        App::import("Model", "NewsCategory");  
		$NewsCategory = new NewsCategory();  
        $catdata = $NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$category_id)));
        $category_slug = $catdata['NewsCategory']['slug'];
        return DEFAULT_FRONT_NEWS_CATEGORY_URL.$category_slug;           
    }

    public function get_cat_slug($category_id)
    {
        App::import("Model", "NewsCategory");  
        $NewsCategory = new NewsCategory();  
        $catdata = $NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$category_id)));
        $category_slug = $catdata['NewsCategory']['slug'];
        return $category_slug;           
    }

}