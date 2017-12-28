<?php
class FrontController extends AppController
{
	var $name = 'Front';
    public $components = array('Cookie', 'Session', 'Email', 'Paginator');
    public $helpers = array('Html', 'Form', 'Session', 'Time');

    public function comingsoon(){
        //echo "<center><h1>Coming Soon</h1></center>";
        //exit;
    }

    public function home(){
    	//echo "home page";exit;

    	$this->loadmodel('News');
        $this->loadmodel('NewsCategory');

    	$latest_news_gallery_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'9\',categories)'), 'limit' => 3, 'order' => array('id' => 'desc')));
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

    	$latest_news_4th_data = $this->News->find('first', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'9\',categories)'), 'limit' => 1, 'page' => 4,  'order' => array('id' => 'desc')));
        $latest_news_4th_cats = explode(',', $latest_news_4th_data['News']['categories']);
        $latest_news_4th_cat = $latest_news_4th_cats[0];
        $latest_newscate_4th_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$latest_news_4th_cat)));
        $latest_news_4th_data['News']['cat_id'] = $latest_newscate_4th_data['NewsCategory']['id'];
        $latest_news_4th_data['News']['cat_name'] = $latest_newscate_4th_data['NewsCategory']['name'];
        $latest_news_4th_data['News']['cat_slug'] = $latest_newscate_4th_data['NewsCategory']['slug'];
    	$this->set('latest_news_4th_data', $latest_news_4th_data);

    	$latest_news_5th_data = $this->News->find('first', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'9\',categories)'), 'limit' => 1, 'page' => 5,  'order' => array('id' => 'desc')));
        $latest_news_5th_cats = explode(',', $latest_news_5th_data['News']['categories']);
        $latest_news_5th_cat = $latest_news_5th_cats[0];
        $latest_newscate_5th_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$latest_news_4th_cat)));
        $latest_news_5th_data['News']['cat_id'] = $latest_newscate_5th_data['NewsCategory']['id'];
        $latest_news_5th_data['News']['cat_name'] = $latest_newscate_5th_data['NewsCategory']['name'];
        $latest_news_5th_data['News']['cat_slug'] = $latest_newscate_5th_data['NewsCategory']['slug'];
    	$this->set('latest_news_5th_data', $latest_news_5th_data);

        $latest_news_6th_data = $this->News->find('first', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'9\',categories)'), 'limit' => 1, 'page' => 6,  'order' => array('id' => 'desc')));
        $latest_news_6th_cats = explode(',', $latest_news_6th_data['News']['categories']);
        $latest_news_6th_cat = $latest_news_6th_cats[0];
        $latest_newscate_6th_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$latest_news_4th_cat)));
        $latest_news_6th_data['News']['cat_id'] = $latest_newscate_6th_data['NewsCategory']['id'];
        $latest_news_6th_data['News']['cat_name'] = $latest_newscate_6th_data['NewsCategory']['name'];
        $latest_news_6th_data['News']['cat_slug'] = $latest_newscate_6th_data['NewsCategory']['slug'];
        $this->set('latest_news_6th_data', $latest_news_6th_data);

    	$latest_samachar_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'1\',categories)'), 'limit' => 4, 'order' => array('id' => 'desc')));
        $latest_newscate_samachar_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>1)));
        foreach ($latest_samachar_homepage_data as $latest_samachar_key => $latest_samachar_data)
        {
            $latest_samachar_homepage_data[$latest_samachar_key]['News']['cat_id'] = $latest_newscate_samachar_data['NewsCategory']['id'];
            $latest_samachar_homepage_data[$latest_samachar_key]['News']['cat_name'] = $latest_newscate_samachar_data['NewsCategory']['name'];
            $latest_samachar_homepage_data[$latest_samachar_key]['News']['cat_slug'] = $latest_newscate_samachar_data['NewsCategory']['slug'];
        }
    	$this->set('latest_samachar_homepage_data', $latest_samachar_homepage_data);

        $latest_margdarshan_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'2\',categories)'), 'limit' => 10, 'order' => array('id' => 'desc')));
        $latest_newscate_margdarshan_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>2)));
        foreach ($latest_margdarshan_homepage_data as $latest_margdarshan_key => $latest_margdarshan_data)
        {
            $latest_margdarshan_homepage_data[$latest_margdarshan_key]['News']['cat_id'] = $latest_newscate_margdarshan_data['NewsCategory']['id'];
            $latest_margdarshan_homepage_data[$latest_margdarshan_key]['News']['cat_name'] = $latest_newscate_margdarshan_data['NewsCategory']['name'];
            $latest_margdarshan_homepage_data[$latest_margdarshan_key]['News']['cat_slug'] = $latest_newscate_margdarshan_data['NewsCategory']['slug'];
        }
        $this->set('latest_margdarshan_homepage_data', $latest_margdarshan_homepage_data);

        $latest_samadhan_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'3\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        $latest_newscate_samadhan_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>3)));
        foreach ($latest_samadhan_homepage_data as $latest_samadhan_key => $latest_samadhan_data)
        {
            $latest_samadhan_homepage_data[$latest_samadhan_key]['News']['cat_id'] = $latest_newscate_samadhan_data['NewsCategory']['id'];
            $latest_samadhan_homepage_data[$latest_samadhan_key]['News']['cat_name'] = $latest_newscate_samadhan_data['NewsCategory']['name'];
            $latest_samadhan_homepage_data[$latest_samadhan_key]['News']['cat_slug'] = $latest_newscate_samadhan_data['NewsCategory']['slug'];
        }
        $this->set('latest_samadhan_homepage_data', $latest_samadhan_homepage_data);

        $latest_vicharmanch_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'4\',categories)'), 'limit' => 3, 'order' => array('id' => 'desc')));
        $latest_newscate_vicharmanch_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>4)));
        foreach ($latest_vicharmanch_homepage_data as $latest_vicharmanch_key => $latest_vicharmanch_data)
        {
            $latest_vicharmanch_homepage_data[$latest_vicharmanch_key]['News']['cat_id'] = $latest_newscate_vicharmanch_data['NewsCategory']['id'];
            $latest_vicharmanch_homepage_data[$latest_vicharmanch_key]['News']['cat_name'] = $latest_newscate_vicharmanch_data['NewsCategory']['name'];
            $latest_vicharmanch_homepage_data[$latest_vicharmanch_key]['News']['cat_slug'] = $latest_newscate_vicharmanch_data['NewsCategory']['slug'];
        }
        $this->set('latest_vicharmanch_homepage_data', $latest_vicharmanch_homepage_data);

        $latest_prerna_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'5\',categories)'), 'limit' => 6, 'order' => array('id' => 'desc')));
        $latest_newscate_prerna_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>5)));
        foreach ($latest_prerna_homepage_data as $latest_prerna_key => $latest_prerna_data)
        {
            $latest_prerna_homepage_data[$latest_prerna_key]['News']['cat_id'] = $latest_newscate_prerna_data['NewsCategory']['id'];
            $latest_prerna_homepage_data[$latest_prerna_key]['News']['cat_name'] = $latest_newscate_prerna_data['NewsCategory']['name'];
            $latest_prerna_homepage_data[$latest_prerna_key]['News']['cat_slug'] = $latest_newscate_prerna_data['NewsCategory']['slug'];
        }
        $this->set('latest_prerna_homepage_data', $latest_prerna_homepage_data);

    	$latest_gauseva_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'6\',categories)'), 'limit' => 4, 'order' => array('id' => 'desc')));
        $latest_newscate_gauseva_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>6)));
        foreach ($latest_gauseva_homepage_data as $latest_gauseva_key => $latest_gauseva_data)
        {
            $latest_gauseva_homepage_data[$latest_gauseva_key]['News']['cat_id'] = $latest_newscate_gauseva_data['NewsCategory']['id'];
            $latest_gauseva_homepage_data[$latest_gauseva_key]['News']['cat_name'] = $latest_newscate_gauseva_data['NewsCategory']['name'];
            $latest_gauseva_homepage_data[$latest_gauseva_key]['News']['cat_slug'] = $latest_newscate_gauseva_data['NewsCategory']['slug'];
        }
    	$this->set('latest_gauseva_homepage_data', $latest_gauseva_homepage_data);

        $latest_levench_homepage_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'8\',categories)'), 'limit' => 10, 'order' => array('id' => 'desc')));
        $latest_newscate_levench_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>7)));
        foreach ($latest_levench_homepage_data as $latest_levench_key => $latest_levench_data)
        {
            $latest_levench_homepage_data[$latest_levench_key]['News']['cat_id'] = $latest_newscate_levench_data['NewsCategory']['id'];
            $latest_levench_homepage_data[$latest_levench_key]['News']['cat_name'] = $latest_newscate_levench_data['NewsCategory']['name'];
            $latest_levench_homepage_data[$latest_levench_key]['News']['cat_slug'] = $latest_newscate_levench_data['NewsCategory']['slug'];
        }
        $this->set('latest_levench_homepage_data', $latest_levench_homepage_data);

        $this->loadmodel('Video');
        $latest_videos_homepage_data = $this->Video->find('all', array('conditions' => array('status IN'=> array(1)), 'limit' => 3, 'order' => array('id' => 'desc')));
        $this->set('latest_videos_homepage_data', $latest_videos_homepage_data);

        $this->loadmodel('Poll');
        $latest_polls_homepage_data = $this->Poll->find('all', array('conditions' => array('status IN'=> array(1)), 'limit' => 5, 'order' => array('id' => 'desc')));
        $this->set('latest_polls_homepage_data', $latest_polls_homepage_data);
        $this->set('owl_enabled', 'enabled');

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

            $get_sidebarupr_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'6\',categories)'), 'limit' => 5, 'order' => array('id' => 'desc')));
            //$this->pre($get_morenews_data_by_category);exit;
            $sidebarupr_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>3)));
            foreach ($get_sidebarupr_data_by_category as $sidebarupr_key => $sidebarupr_data)
            {
                $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_id'] = $sidebarupr_catdata['NewsCategory']['id'];
                $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_name'] = $sidebarupr_catdata['NewsCategory']['name'];
                $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_slug'] = $sidebarupr_catdata['NewsCategory']['slug'];
            }

            $get_sidebardown_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'8\',categories)'), 'limit' => 4, 'order' => array('id' => 'desc')));
            //$this->pre($get_morenews_data_by_category);exit;
            $sidebardown_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>2)));
            foreach ($get_sidebardown_data_by_category as $sidebardown_key => $sidebardown_data)
            {
                $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_id'] = $sidebardown_catdata['NewsCategory']['id'];
                $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_name'] = $sidebardown_catdata['NewsCategory']['name'];
                $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_slug'] = $sidebardown_catdata['NewsCategory']['slug'];
            }

        } else {
            $get_catenews_data_by_category = array();
            $get_sidebarupr_data_by_category = array(); 
            $get_sidebardown_data_by_category = array();    
        }

        //$this->pre($category_title);
        //$this->pre($get_catenews_data_by_category);
        $this->set('category_id', $category_id);
        $this->set('category_title', $category_title);
        $this->set('category_news_data', $get_catenews_data_by_category);
        $this->set('news_page_sidebarupr', $get_sidebarupr_data_by_category);
        $this->set('news_page_sidebardown', $get_sidebardown_data_by_category);
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
            $news_page_slug = $get_news_data_by_slug['News']['slug'];
            $news_page_content = $get_news_data_by_slug['News']['content'];
            $news_page_images = $get_news_data_by_slug['News']['images'];
            $news_page_videos = $get_news_data_by_slug['News']['videos'];
            $news_page_modified = $get_news_data_by_slug['News']['modified'];
            $news_page_views = (int) $get_news_data_by_slug['News']['views'];

            if(!empty($news_page_images)){
                $og_images = explode(',', $news_page_images);
                $og_image = $og_images[0];
            } else {
                $og_image = DEFAULT_URL.'img/new-default.png';
            }

        } else {
            $news_page_id = '';
            $news_page_content = '';
            $news_page_title = '';
            $news_page_content = '';
            $news_page_slug = '';
            $news_page_images = '';
            $news_page_videos = '';
            $news_page_modified = '';
            $new_page_views = 0;
            $og_image = DEFAULT_URL.'img/new-default.png';
        }

        $this->loadmodel('NewsCategory');
        $get_newscat_data_by_slug = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'slug'=>$categoryslug)));

        if(!empty($get_newscat_data_by_slug['NewsCategory']['name']))
        {
            $category_title = $get_newscat_data_by_slug['NewsCategory']['name'];
            $category_slug = $get_newscat_data_by_slug['NewsCategory']['slug'];
            $category_id = $get_newscat_data_by_slug['NewsCategory']['id'];
        } else {
            $category_title = '';
            $category_slug = '';
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

        if($news_page_id){
            $news_page_views++;
            $update_views_data = array();
            $update_views_data['News']['id'] = $news_page_id;
            $update_views_data['News']['views'] = $news_page_views;
            //$this->pre($update_views_data);exit;
            $this->News->save($update_views_data, false);
        }

        $this->set('page_name', 'news_detail');
        $this->set('owl_enabled', 'enabled');

        $this->set('og_enabled', true);
        $this->set('og_url', DEFAULT_URL.'news-detail/'.$category_slug.'/'.$news_page_slug);
        $this->set('og_title', $news_page_title);
        $this->set('og_description', $news_page_content);
        $this->set('og_image', $og_image);

        $this->set('category_id', $category_id);
        $this->set('category_title', $category_title);
        $this->set('news_page_id', $news_page_id);
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

        $get_sidebarupr_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'6\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebarupr_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>6)));
        foreach ($get_sidebarupr_data_by_category as $sidebarupr_key => $sidebarupr_data)
        {
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_id'] = $sidebarupr_catdata['NewsCategory']['id'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_name'] = $sidebarupr_catdata['NewsCategory']['name'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_slug'] = $sidebarupr_catdata['NewsCategory']['slug'];
        }

        $get_sidebardown_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'8\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebardown_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>8)));
        foreach ($get_sidebardown_data_by_category as $sidebardown_key => $sidebardown_data)
        {
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_id'] = $sidebardown_catdata['NewsCategory']['id'];
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_name'] = $sidebardown_catdata['NewsCategory']['name'];
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_slug'] = $sidebardown_catdata['NewsCategory']['slug'];
        }

        $this->set('videos_data',$videos_data);
        $this->set('news_page_sidebarupr', $get_sidebarupr_data_by_category);
        $this->set('news_page_sidebardown', $get_sidebardown_data_by_category);      
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

        $get_sidebarupr_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'6\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebarupr_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>6)));
        foreach ($get_sidebarupr_data_by_category as $sidebarupr_key => $sidebarupr_data)
        {
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_id'] = $sidebarupr_catdata['NewsCategory']['id'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_name'] = $sidebarupr_catdata['NewsCategory']['name'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_slug'] = $sidebarupr_catdata['NewsCategory']['slug'];
        }

        $get_sidebardown_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'8\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebardown_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>8)));
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

    public function pollsubmit(){

        if ($this->request->is('post'))
        {
            $this->loadmodel('Poll');

            if(!empty($this->request->data) && isset($this->request->data) )
            {
                //$this->pre($this->request->data);exit;
                $answer = (int) trim($this->request->data['poll_answer']);
                $poll_id = (int) trim($this->request->data['poll_id']);
                //$redirect_url = $this->request->data['redirect_url'];
     
                if(!empty($answer) && !empty($poll_id))
                {
                    $get_poll_data_by_id = $this->Poll->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$poll_id)));

                    //$this->pre($get_poll_data_by_id);exit;
                    //exit;

                    $update_poll_data = array();
                    $update_poll_data['Poll']['id'] = $poll_id;
                    if($answer == 2){
                        $answer2_votes = $get_poll_data_by_id['Poll']['answer2_vote'];
                        $answer2_votes++;
                        $update_poll_data['Poll']['answer2_vote'] = $answer2_votes;
                        $update_poll_data['Poll']['last_answer'] = 2;
                    } else {
                        $answer1_votes = $get_poll_data_by_id['Poll']['answer1_vote'];
                        $answer1_votes++;
                        $update_poll_data['Poll']['answer1_vote'] = $answer1_votes;
                        $update_poll_data['Poll']['last_answer'] = 1;
                    }
                    //$this->pre($update_poll_data);exit;
                    $saved = $this->Poll->save($update_poll_data, false);

                    //$_SESSION['vote_success_msg'] = "Thanks for voting.";

                    /*if(!empty($redirect_url)){
                        $this->redirect($redirect_url);
                    } else {
                        $this->redirect(DEFAULT_URL);
                    }*/

                    if($saved){
                        echo 'success';exit;
                    }
                    else
                    {
                        echo 'failed';exit;
                    }
                }
                else
                {
                    //$this->redirect(DEFAULT_URL);
                    echo 'failed';exit;
                }
            }
            else
            {
                //$this->redirect(DEFAULT_URL);
                echo 'failed';exit;
            }
        }
        else
        {
            //$this->redirect(DEFAULT_URL);
            echo 'failed';exit;
        }

    }

    public function polls_listing(){
        $this->loadmodel('Poll');

        $this->paginate = array(
            'conditions' => array('status IN'=> array(1)),
            'limit' => 1,
            'order' => array('id' => 'desc')
        );

        $polls_data = $this->paginate('Poll');

        //$this->pre($videos_data);exit;

        $get_sidebarupr_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'6\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebarupr_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>6)));
        foreach ($get_sidebarupr_data_by_category as $sidebarupr_key => $sidebarupr_data)
        {
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_id'] = $sidebarupr_catdata['NewsCategory']['id'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_name'] = $sidebarupr_catdata['NewsCategory']['name'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_slug'] = $sidebarupr_catdata['NewsCategory']['slug'];
        }

        $get_sidebardown_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'8\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebardown_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>8)));
        foreach ($get_sidebardown_data_by_category as $sidebardown_key => $sidebardown_data)
        {
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_id'] = $sidebardown_catdata['NewsCategory']['id'];
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_name'] = $sidebardown_catdata['NewsCategory']['name'];
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_slug'] = $sidebardown_catdata['NewsCategory']['slug'];
        }

        $this->set('polls_data',$polls_data);
        $this->set('news_page_sidebarupr', $get_sidebarupr_data_by_category);
        $this->set('news_page_sidebardown', $get_sidebardown_data_by_category);      
    }

    public function gallery_listing(){
        $this->loadmodel('Gallery');
        $this->loadmodel('News');

        $this->paginate = array(
            'conditions' => array('status IN'=> array(1)),
            'limit' => 10,
            'order' => array('id' => 'desc')
        );

        $galleries_data = $this->paginate('Gallery');

        //$this->pre($videos_data);exit;

        $get_sidebarupr_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'6\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebarupr_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>6)));
        foreach ($get_sidebarupr_data_by_category as $sidebarupr_key => $sidebarupr_data)
        {
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_id'] = $sidebarupr_catdata['NewsCategory']['id'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_name'] = $sidebarupr_catdata['NewsCategory']['name'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_slug'] = $sidebarupr_catdata['NewsCategory']['slug'];
        }

        $get_sidebardown_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'8\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebardown_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>8)));
        foreach ($get_sidebardown_data_by_category as $sidebardown_key => $sidebardown_data)
        {
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_id'] = $sidebardown_catdata['NewsCategory']['id'];
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_name'] = $sidebardown_catdata['NewsCategory']['name'];
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_slug'] = $sidebardown_catdata['NewsCategory']['slug'];
        }

        $this->set('galleries_data',$galleries_data);
        $this->set('news_page_sidebarupr', $get_sidebarupr_data_by_category);
        $this->set('news_page_sidebardown', $get_sidebardown_data_by_category);      
    }

    public function gallery_detail($slug)
    {
        $this->loadmodel('Gallery');

        $get_gallery_data_by_slug = $this->Gallery->find('first', array('conditions' => array('status IN'=> array(1), 'slug'=>$slug)));

        if(!empty($get_gallery_data_by_slug['Gallery']['images']))
        {
            $gallery_page_id = $get_gallery_data_by_slug['Gallery']['id'];
            $gallery_page_content = $get_gallery_data_by_slug['Gallery']['content'];
            $gallery_page_title = $get_gallery_data_by_slug['Gallery']['title'];
            $gallery_page_images = $get_gallery_data_by_slug['Gallery']['images'];
            $gallery_page_modified = $get_gallery_data_by_slug['Gallery']['modified'];
        } else {
            $gallery_page_id = '';
            $gallery_page_content = '';
            $gallery_page_title = '';
            $gallery_page_images = '';
            $gallery_page_modified = '';
        }

        $get_moregallery_data = $this->Gallery->find('all', array('conditions' => array('status IN'=> array(1), 'id NOT IN'=>array($gallery_page_id)), 'limit' => 10, 'order' => array('id' => 'desc')) );

        //$this->pre($get_moregallery_data);

        $get_sidebarupr_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'6\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebarupr_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>6)));
        foreach ($get_sidebarupr_data_by_category as $sidebarupr_key => $sidebarupr_data)
        {
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_id'] = $sidebarupr_catdata['NewsCategory']['id'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_name'] = $sidebarupr_catdata['NewsCategory']['name'];
            $get_sidebarupr_data_by_category[$sidebarupr_key]['News']['cat_slug'] = $sidebarupr_catdata['NewsCategory']['slug'];
        }

        $get_sidebardown_data_by_category = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\'8\',categories)'), 'limit' => 7, 'order' => array('id' => 'desc')));
        //$this->pre($get_morenews_data_by_category);exit;
        $sidebardown_catdata = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>8)));
        foreach ($get_sidebardown_data_by_category as $sidebardown_key => $sidebardown_data)
        {
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_id'] = $sidebardown_catdata['NewsCategory']['id'];
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_name'] = $sidebardown_catdata['NewsCategory']['name'];
            $get_sidebardown_data_by_category[$sidebardown_key]['News']['cat_slug'] = $sidebardown_catdata['NewsCategory']['slug'];
        }

        $this->set('owl_enabled', 'enabled');
        $this->set('page_name', 'gallery_detail');
        $this->set('gallery_page_title', $gallery_page_title);
        $this->set('gallery_page_images', $gallery_page_images);
        $this->set('gallery_page_content', $gallery_page_content);
        $this->set('gallery_page_modified', $gallery_page_modified);
        $this->set('gallery_page_moregallery', $get_moregallery_data);
        $this->set('news_page_sidebarupr', $get_sidebarupr_data_by_category);
        $this->set('news_page_sidebardown', $get_sidebardown_data_by_category);

    }

    public function live_tv(){
        $this->set('livetv_page_title', 'Live TV');
    }

    public function marketing(){
        $this->set('marketing_page_title', 'માર્કેટિંગ યાર્ડ ભાવ');
    }

}