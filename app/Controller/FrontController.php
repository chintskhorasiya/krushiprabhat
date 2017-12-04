<?php
class FrontController extends AppController
{
	var $name = 'Front';
    public $components = array('Cookie', 'Session', 'Email', 'Paginator');
    public $helpers = array('Html', 'Form', 'Session', 'Time');

    public function comingsoon(){
        echo "<center><h1>Coming Soon</h1></center>";
        exit;
    }

    public function home(){
    	//echo "home page";exit;

    	$this->loadmodel('News');
        $this->loadmodel('NewsCategory');

    	$latest_news_gallery_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1)), 'limit' => 3, 'order' => array('id' => 'desc')));
        foreach ($latest_news_gallery_data as $latest_news_key => $latest_news_data)
        {
            $latest_news_cats = explode(',', $latest_news_data['News']['categories']);
            $latest_news_cat = $latest_news_cats[0];
            $latest_newscate_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$latest_news_cat)));
            $latest_news_gallery_data[$latest_news_key]['News']['cat_id'] = $latest_newscate_data['NewsCategory']['id'];
            $latest_news_gallery_data[$latest_news_key]['News']['cat_name'] = $latest_newscate_data['NewsCategory']['name'];
            $latest_news_gallery_data[$latest_news_key]['News']['cat_slug'] = $latest_newscate_data['NewsCategory']['slug'];
        }
    	$this->set('latest_news_gallery_data', $latest_news_gallery_data);

    	$latest_news_4th_data = $this->News->find('first', array('conditions' => array('status IN'=> array(1)), 'limit' => 1, 'page' => 4,  'order' => array('id' => 'desc')));
        $latest_news_4th_cats = explode(',', $latest_news_4th_data['News']['categories']);
        $latest_news_4th_cat = $latest_news_4th_cats[0];
        $latest_newscate_4th_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$latest_news_4th_cat)));
        $latest_news_4th_data['News']['cat_id'] = $latest_newscate_4th_data['NewsCategory']['id'];
        $latest_news_4th_data['News']['cat_name'] = $latest_newscate_4th_data['NewsCategory']['name'];
        $latest_news_4th_data['News']['cat_slug'] = $latest_newscate_4th_data['NewsCategory']['slug'];
    	$this->set('latest_news_4th_data', $latest_news_4th_data);

    	$latest_news_5th_data = $this->News->find('first', array('conditions' => array('status IN'=> array(1)), 'limit' => 1, 'page' => 5,  'order' => array('id' => 'desc')));
        $latest_news_5th_cats = explode(',', $latest_news_5th_data['News']['categories']);
        $latest_news_5th_cat = $latest_news_5th_cats[0];
        $latest_newscate_5th_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$latest_news_4th_cat)));
        $latest_news_5th_data['News']['cat_id'] = $latest_newscate_5th_data['NewsCategory']['id'];
        $latest_news_5th_data['News']['cat_name'] = $latest_newscate_5th_data['NewsCategory']['name'];
        $latest_news_5th_data['News']['cat_slug'] = $latest_newscate_5th_data['NewsCategory']['slug'];
    	$this->set('latest_news_5th_data', $latest_news_5th_data);

    	$latest_newzealand_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'1\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        $latest_newscate_newzealand_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>1)));
        foreach ($latest_newzealand_homepage_data as $latest_newzealand_key => $latest_newzealand_data)
        {
            $latest_newzealand_homepage_data[$latest_newzealand_key]['News']['cat_id'] = $latest_newscate_newzealand_data['NewsCategory']['id'];
            $latest_newzealand_homepage_data[$latest_newzealand_key]['News']['cat_name'] = $latest_newscate_newzealand_data['NewsCategory']['name'];
            $latest_newzealand_homepage_data[$latest_newzealand_key]['News']['cat_slug'] = $latest_newscate_newzealand_data['NewsCategory']['slug'];
        }
    	$this->set('latest_newzealand_homepage_data', $latest_newzealand_homepage_data);

    	$latest_australlia_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'7\',categories)'), 'limit' => 10, 'order' => array('id' => 'desc')));
        $latest_newscate_australlia_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>7)));
        foreach ($latest_australlia_homepage_data as $latest_australlia_key => $latest_australlia_data)
        {
            $latest_australlia_homepage_data[$latest_australlia_key]['News']['cat_id'] = $latest_newscate_australlia_data['NewsCategory']['id'];
            $latest_australlia_homepage_data[$latest_australlia_key]['News']['cat_name'] = $latest_newscate_australlia_data['NewsCategory']['name'];
            $latest_australlia_homepage_data[$latest_australlia_key]['News']['cat_slug'] = $latest_newscate_australlia_data['NewsCategory']['slug'];
        }
    	$this->set('latest_australlia_homepage_data', $latest_australlia_homepage_data);

    	$latest_world_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'4\',categories)'), 'limit' => 6, 'order' => array('id' => 'desc')));
        $latest_newscate_world_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>4)));
        foreach ($latest_world_homepage_data as $latest_world_key => $latest_world_data)
        {
            $latest_world_homepage_data[$latest_world_key]['News']['cat_id'] = $latest_newscate_world_data['NewsCategory']['id'];
            $latest_world_homepage_data[$latest_world_key]['News']['cat_name'] = $latest_newscate_world_data['NewsCategory']['name'];
            $latest_world_homepage_data[$latest_world_key]['News']['cat_slug'] = $latest_newscate_world_data['NewsCategory']['slug'];
        }
    	$this->set('latest_world_homepage_data', $latest_world_homepage_data);

    	$latest_gujarat_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'3\',categories)'), 'limit' => 8, 'order' => array('id' => 'desc')));
        $latest_newscate_gujarat_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>3)));
        foreach ($latest_gujarat_homepage_data as $latest_gujarat_key => $latest_gujarat_data)
        {
            $latest_gujarat_homepage_data[$latest_gujarat_key]['News']['cat_id'] = $latest_newscate_gujarat_data['NewsCategory']['id'];
            $latest_gujarat_homepage_data[$latest_gujarat_key]['News']['cat_name'] = $latest_newscate_gujarat_data['NewsCategory']['name'];
            $latest_gujarat_homepage_data[$latest_gujarat_key]['News']['cat_slug'] = $latest_newscate_gujarat_data['NewsCategory']['slug'];
        }
    	$this->set('latest_gujarat_homepage_data', $latest_gujarat_homepage_data);


    	$latest_sports_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'5\',categories)'), 'limit' => 5, 'order' => array('id' => 'desc')));
        $latest_newscate_sports_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>5)));
        foreach ($latest_sports_homepage_data as $latest_sports_key => $latest_sports_data)
        {
            $latest_sports_homepage_data[$latest_sports_key]['News']['cat_id'] = $latest_newscate_sports_data['NewsCategory']['id'];
            $latest_sports_homepage_data[$latest_sports_key]['News']['cat_name'] = $latest_newscate_sports_data['NewsCategory']['name'];
            $latest_sports_homepage_data[$latest_sports_key]['News']['cat_slug'] = $latest_newscate_sports_data['NewsCategory']['slug'];
        }
    	$this->set('latest_sports_homepage_data', $latest_sports_homepage_data);

    	$latest_bollywood_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'6\',categories)'), 'limit' => 4, 'order' => array('id' => 'desc')));
        $latest_newscate_bollywood_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>6)));
        foreach ($latest_bollywood_homepage_data as $latest_bollywood_key => $latest_bollywood_data)
        {
            $latest_bollywood_homepage_data[$latest_bollywood_key]['News']['cat_id'] = $latest_newscate_bollywood_data['NewsCategory']['id'];
            $latest_bollywood_homepage_data[$latest_bollywood_key]['News']['cat_name'] = $latest_newscate_bollywood_data['NewsCategory']['name'];
            $latest_bollywood_homepage_data[$latest_bollywood_key]['News']['cat_slug'] = $latest_newscate_bollywood_data['NewsCategory']['slug'];
        }
    	$this->set('latest_bollywood_homepage_data', $latest_bollywood_homepage_data);

    	$latest_columns_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'8\',categories)'), 'limit' => 3, 'order' => array('id' => 'desc')));
    	$latest_newscate_columns_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>8)));
        foreach ($latest_columns_homepage_data as $latest_columns_key => $latest_columns_data)
        {
            $latest_columns_homepage_data[$latest_columns_key]['News']['cat_id'] = $latest_newscate_columns_data['NewsCategory']['id'];
            $latest_columns_homepage_data[$latest_columns_key]['News']['cat_name'] = $latest_newscate_columns_data['NewsCategory']['name'];
            $latest_columns_homepage_data[$latest_columns_key]['News']['cat_slug'] = $latest_newscate_columns_data['NewsCategory']['slug'];
        }
        $this->set('latest_columns_homepage_data', $latest_columns_homepage_data);

    	$latest_india_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'2\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
    	$latest_newscate_india_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>2)));
        foreach ($latest_india_homepage_data as $latest_india_key => $latest_india_data)
        {
            $latest_india_homepage_data[$latest_india_key]['News']['cat_id'] = $latest_newscate_india_data['NewsCategory']['id'];
            $latest_india_homepage_data[$latest_india_key]['News']['cat_name'] = $latest_newscate_india_data['NewsCategory']['name'];
            $latest_india_homepage_data[$latest_india_key]['News']['cat_slug'] = $latest_newscate_india_data['NewsCategory']['slug'];
        }
        $this->set('latest_india_homepage_data', $latest_india_homepage_data);

        $this->loadmodel('Video');
        $latest_videos_homepage_data = $this->Video->find('all', array('conditions' => array('status IN'=> array(1)), 'limit' => 3, 'order' => array('id' => 'desc')));
        $this->set('latest_videos_homepage_data', $latest_videos_homepage_data);

    	// footer queries

    	/*$latest_newzealand_footer_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'1\',categories)'), 'limit' => 4, 'order' => array('id' => 'desc')));
    	$this->set('latest_newzealand_footer_data', $latest_newzealand_footer_data);

    	$latest_sports_footer_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'5\',categories)'), 'limit' => 4, 'order' => array('id' => 'desc')));
    	$this->set('latest_sports_footer_data', $latest_sports_footer_data);

    	$latest_world_footer_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'4\',categories)'), 'limit' => 4, 'order' => array('id' => 'desc')));
    	$this->set('latest_world_footer_data', $latest_world_footer_data);

    	$latest_gujarat_footer_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'3\',categories)'), 'limit' => 4, 'order' => array('id' => 'desc')));
    	$this->set('latest_gujarat_footer_data', $latest_gujarat_footer_data);

    	$latest_bollywood_footer_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'6\',categories)'), 'limit' => 4, 'order' => array('id' => 'desc')));
    	$this->set('latest_bollywood_footer_data', $latest_bollywood_footer_data);

    	$latest_india_footer_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'2\',categories)'), 'limit' => 4, 'order' => array('id' => 'desc')));
    	$this->set('latest_india_footer_data', $latest_india_footer_data);*/

    }

    public function news_listing($categoryslug)
    {
        $this->loadmodel('NewsCategory');
        $get_newscat_data_by_slug = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'slug'=>$categoryslug)));

        if(!empty($get_newscat_data_by_slug['NewsCategory']['name']))
        {
            $category_title = $get_newscat_data_by_slug['NewsCategory']['name'];
            $category_id = $get_newscat_data_by_slug['NewsCategory']['id'];
        } else {
            $category_title = '';
            $category_id = '';
        }

        if(!empty($category_id)){
            $get_catenews_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\''.$category_id.'\',categories)'), 'limit' => 17, 'order' => array('id' => 'desc')));
            //$this->pre($get_morenews_data_by_category);exit;
            $catenews_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$category_id)));
            foreach ($get_catenews_data_by_category as $catenews_key => $catenews_data)
            {
                $get_catenews_data_by_category[$catenews_key]['News']['cat_id'] = $catenews_catdata['NewsCategory']['id'];
                $get_catenews_data_by_category[$catenews_key]['News']['cat_name'] = $catenews_catdata['NewsCategory']['name'];
                $get_catenews_data_by_category[$catenews_key]['News']['cat_slug'] = $catenews_catdata['NewsCategory']['slug'];
            }

            $get_sidebarupr_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'3\',categories)'), 'limit' => 5, 'order' => array('id' => 'desc')));
            //$this->pre($get_morenews_data_by_category);exit;
            $sidebarupr_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>3)));
            foreach ($get_sidebarupr_data_by_category as $sidebarupr_key => $sidebarupr_data)
            {
                $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_id'] = $sidebarupr_catdata['NewsCategory']['id'];
                $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_name'] = $sidebarupr_catdata['NewsCategory']['name'];
                $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_slug'] = $sidebarupr_catdata['NewsCategory']['slug'];
            }

        } else {
            $get_catenews_data_by_category = array();
            $get_sidebarupr_data_by_category = array();    
        }

        //$this->pre($category_title);
        //$this->pre($get_catenews_data_by_category);
        $this->set('category_id', $category_id);
        $this->set('category_title', $category_title);
        $this->set('category_news_data', $get_catenews_data_by_category);
        $this->set('news_page_sidebarupr', $get_sidebarupr_data_by_category);
    }

    public function news_detail($categoryslug, $slug)
    {
        //$this->loadmodel('Page');
        $get_news_data_by_slug = $this->News->find('first', array('conditions' => array('status IN'=> array(1), 'slug'=>$slug)));

        if(!empty($get_news_data_by_slug['News']['content']))
        {
            $news_page_id = $get_news_data_by_slug['News']['id'];
            $news_page_content = $get_news_data_by_slug['News']['content'];
            $news_page_title = $get_news_data_by_slug['News']['title'];
            $news_page_images = $get_news_data_by_slug['News']['images'];
            $news_page_videos = $get_news_data_by_slug['News']['videos'];
            $news_page_modified = $get_news_data_by_slug['News']['modified'];
        } else {
            $news_page_id = '';
            $news_page_content = '';
            $news_page_title = '';
            $news_page_images = '';
            $news_page_videos = '';
            $news_page_modified = '';
        }

        $this->loadmodel('NewsCategory');
        $get_newscat_data_by_slug = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'slug'=>$categoryslug)));

        if(!empty($get_newscat_data_by_slug['NewsCategory']['name']))
        {
            $category_title = $get_newscat_data_by_slug['NewsCategory']['name'];
            $category_id = $get_newscat_data_by_slug['NewsCategory']['id'];
        } else {
            $category_title = '';
            $category_id = '';
        }

        if(!empty($category_id)){
            $get_morenews_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'id NOT IN'=>array($news_page_id), 'FIND_IN_SET(\''.$category_id.'\',categories)'), 'limit' => 20, 'order' => array('id' => 'desc')));
            //$this->pre($get_morenews_data_by_category);exit;
            $morenews_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$category_id)));
            foreach ($get_morenews_data_by_category as $morenews_key => $morenews_data)
            {
                $get_morenews_data_by_category[$morenews_key]['News']['cat_id'] = $morenews_catdata['NewsCategory']['id'];
                $get_morenews_data_by_category[$morenews_key]['News']['cat_name'] = $morenews_catdata['NewsCategory']['name'];
                $get_morenews_data_by_category[$morenews_key]['News']['cat_slug'] = $morenews_catdata['NewsCategory']['slug'];
            }

            $get_sidebarupr_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'3\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
            //$this->pre($get_morenews_data_by_category);exit;
            $sidebarupr_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>3)));
            foreach ($get_sidebarupr_data_by_category as $sidebarupr_key => $sidebarupr_data)
            {
                $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_id'] = $sidebarupr_catdata['NewsCategory']['id'];
                $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_name'] = $sidebarupr_catdata['NewsCategory']['name'];
                $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_slug'] = $sidebarupr_catdata['NewsCategory']['slug'];
            }

            $get_sidebardown_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'2\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
            //$this->pre($get_morenews_data_by_category);exit;
            $sidebardown_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>2)));
            foreach ($get_sidebardown_data_by_category as $sidebardown_key => $sidebardown_data)
            {
                $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_id'] = $sidebardown_catdata['NewsCategory']['id'];
                $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_name'] = $sidebardown_catdata['NewsCategory']['name'];
                $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_slug'] = $sidebardown_catdata['NewsCategory']['slug'];
            }

        } else {
            $get_morenews_data_by_category = array();
            $get_sidebarupr_data_by_category = array();
            $get_sidebardown_data_by_category = array();
        }

        $this->set('category_id', $category_id);
        $this->set('category_title', $category_title);
        $this->set('news_page_title', $news_page_title);
        $this->set('news_page_images', $news_page_images);
        $this->set('news_page_videos', $news_page_videos);
        $this->set('news_page_content', $news_page_content);
        $this->set('news_page_modified', $news_page_modified);
        $this->set('news_page_morenews', $get_morenews_data_by_category);
        $this->set('news_page_sidebarupr', $get_sidebarupr_data_by_category);
        $this->set('news_page_sidebardown', $get_sidebardown_data_by_category);
    }

    public function page_display($slug)
    {
        $this->loadmodel('Page');
        $get_page_data_by_slug = $this->Page->find('first', array('conditions' => array('status IN'=> array(1), 'slug'=>$slug)));

        if(!empty($get_page_data_by_slug['Page']['content']))
        {
            $cms_page_content = $get_page_data_by_slug['Page']['content'];
            $cms_page_title = $get_page_data_by_slug['Page']['title'];
        } else {
            $cms_page_content = '';
            $cms_page_title = '';
        }

        $this->set('cms_page_title', $cms_page_title);
        $this->set('cms_page_content', $cms_page_content);
    }

    public function videos_listing(){
        $this->loadmodel('Video');
        $this->loadmodel('News');

        $this->paginate = array(
            'conditions' => array('status IN'=> array(1)),
            'limit' => 10,
            'order' => array('id' => 'desc')
        );

        $videos_data = $this->paginate('Video');

        //$this->pre($videos_data);exit;

        $get_sidebarupr_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'3\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebarupr_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>3)));
        foreach ($get_sidebarupr_data_by_category as $sidebarupr_key => $sidebarupr_data)
        {
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_id'] = $sidebarupr_catdata['NewsCategory']['id'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_name'] = $sidebarupr_catdata['NewsCategory']['name'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_slug'] = $sidebarupr_catdata['NewsCategory']['slug'];
        }

        $this->set('videos_data',$videos_data);
        $this->set('news_page_sidebarupr', $get_sidebarupr_data_by_category);      
    }

    public function video_detail($slug)
    {
        $this->loadmodel('Video');

        $get_video_data_by_slug = $this->Video->find('first', array('conditions' => array('status IN'=> array(1), 'slug'=>$slug)));

        if(!empty($get_video_data_by_slug['Video']['video']))
        {
            $video_page_id = $get_video_data_by_slug['Video']['id'];
            $video_page_content = $get_video_data_by_slug['Video']['content'];
            $video_page_title = $get_video_data_by_slug['Video']['title'];
            $video_page_video = $get_video_data_by_slug['Video']['video'];
            $video_page_modified = $get_video_data_by_slug['Video']['modified'];
        } else {
            $video_page_id = '';
            $video_page_content = '';
            $video_page_title = '';
            $video_page_images = '';
            $video_page_video = '';
            $video_page_modified = '';
        }

        $get_morevideos_data = $this->Video->find('all', array('conditions' => array('status IN'=> array(1), 'id NOT IN'=>array($video_page_id)), 'limit' => 10, 'order' => array('id' => 'desc')) );

        $get_sidebarupr_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'3\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebarupr_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>3)));
        foreach ($get_sidebarupr_data_by_category as $sidebarupr_key => $sidebarupr_data)
        {
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_id'] = $sidebarupr_catdata['NewsCategory']['id'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_name'] = $sidebarupr_catdata['NewsCategory']['name'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_slug'] = $sidebarupr_catdata['NewsCategory']['slug'];
        }

        $get_sidebardown_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'2\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebardown_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>2)));
        foreach ($get_sidebardown_data_by_category as $sidebardown_key => $sidebardown_data)
        {
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_id'] = $sidebardown_catdata['NewsCategory']['id'];
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_name'] = $sidebardown_catdata['NewsCategory']['name'];
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_slug'] = $sidebardown_catdata['NewsCategory']['slug'];
        }

        $this->set('video_page_title', $video_page_title);
        $this->set('video_page_video', $video_page_video);
        $this->set('video_page_content', $video_page_content);
        $this->set('video_page_modified', $video_page_modified);
        $this->set('video_page_morevideos', $get_morevideos_data);
        $this->set('news_page_sidebarupr', $get_sidebarupr_data_by_category);
        $this->set('news_page_sidebardown', $get_sidebardown_data_by_category);

    }

    public function epapers(){
        //echo "epapers";
    }

    public function epapers_listing($cat_slug){
        //echo "epapers ".$cat_slug;

        if($cat_slug == "aus"){
            $category = 1;
            $category_name = "Australia";
            $category_image = DEFAULT_FRONT_EPAPERS_AUS_IMG_URL;
        } else {
            $category = 0;
            $category_name = "New Zealand";            
            $category_image = DEFAULT_FRONT_EPAPERS_NZ_IMG_URL;
        }

        $this->loadmodel('Epaper');

        $this->paginate = array(
            'conditions' => array('status IN'=> array(1), 'category IN'=>array($category)),
            'limit' => 8,
            'order' => array('id' => 'desc')
        );

        $get_epapers_data = $this->paginate('Epaper');

        //$this->pre($get_epapers_data);exit;
        $this->set('category_name', $category_name);
        $this->set('category_image', $category_image);
        $this->set('epapers_data', $get_epapers_data);
    }

    public function news_search_results(){

        $this->loadmodel('News');

        if ($this->request->is('post'))
        {
            if(!empty($this->request->data) && isset($this->request->data) )
            {
                //$this->pre($this->request->data);exit;
                $search_key = trim($this->request->data['search_query']);
     
                $conditions[] = array(
                    "OR" => array(
                        "News.title LIKE" => "%".$search_key."%",
                        "News.content LIKE" => "%".$search_key."%",
                        "News.seo_title LIKE" => "%".$search_key."%",
                        "News.seo_desc LIKE" => "%".$search_key."%"
                    )
                );

                $this->Session->write('frontSearchNewsCond', $conditions);
                $this->Session->write('front_search_news_key', $search_key);
            }
        }

        $mainConditions = array('status IN'=> array(1));

        if ($this->Session->check('frontSearchNewsCond')) {
            $conditions = $this->Session->read('frontSearchNewsCond');
            $allConditions = array_merge($mainConditions, $conditions);
        } else {
            $conditions = null;
            $allConditions = array_merge($mainConditions, $conditions);
        }

        //$this->pre($allConditions);exit;

        $this->paginate = array(
            'conditions' => $allConditions,
            'limit' => 25,
            'order' => array('id' => 'desc')
        );

        $news_data = $this->paginate('News');

        //$this->pre($news_data);exit;

        $this->set('page_heading','News Search Results');

        $this->set('news_search_data',$news_data);
        $this->set('from_search',true);

        //exit;
    }

}