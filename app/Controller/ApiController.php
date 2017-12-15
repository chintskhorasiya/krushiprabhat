<?php
class ApiController extends AppController
{
	var $name = 'Api';
    public $components = array('Cookie', 'Session', 'Email', 'Paginator');
    public $helpers = array('Html', 'Form', 'Session', 'Time');

    public function get_categories_list()
    {
        $this->loadmodel('NewsCategory');

        $all_newscate_data = $this->NewsCategory->find('all', array('conditions' => array('status IN'=> array(1), 'menu_enabled'=>1), 'order' => array('id' => 'asc')));

        $return_data['categories'] = array();
        foreach ($all_newscate_data as $cat_key => $cat_data) {
            $return_data['categories'][] = $cat_data['NewsCategory'];
        }

        //$this->pre($return_data);exit;

        //echo '<meta http-equiv="content-type" content="text/html;charset=UTF-8">';
        //echo '<meta http-equiv="content-type" content="application/*;charset=UTF-8">';
        echo json_encode($return_data, JSON_UNESCAPED_UNICODE);exit;

    }

    public function get_category_first_news($category_id = 1, $jsonFormat = true)
    {
    	$this->loadmodel('News');
    	$this->loadmodel('NewsCategory');

    	$latest_newscate_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$category_id), 'order' => array('id' => 'desc')));

    	///$this->pre($latest_newscate_data);

    	$category_name = $latest_newscate_data['NewsCategory']['name'];

    	$latest_news_data = $this->News->find('first', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\''.$category_id.'\',categories)'), /*'limit' => 1, 'page' => $page,*/ 'order' => array('id' => 'desc')));

    	//$this->pre($latest_news_data);exit;

    	//$this->pre($return_data);exit;
    	if($jsonFormat){
    		$return_data = array();
    		$return_data[$category_name] = $latest_news_data['News'];
    		echo json_encode($return_data);exit;
    	} else {
    		return $latest_news_data['News'];exit;
    	}

    }

    // for home page - start
    public function get_all_categories_first_news()
    {
    	$this->loadmodel('NewsCategory');

    	$all_newscate_data = $this->NewsCategory->find('all', array('conditions' => array('status IN'=> array(1)), 'order' => array('id' => 'asc')));

    	//$this->pre($all_newscate_data);exit;
    	$cate_news_data = array();
    	foreach ($all_newscate_data as $cat_num => $cat_data)
    	{
    		$cate_id = $cat_data['NewsCategory']['id'];
    		$cate_name = $cat_data['NewsCategory']['name'];
    		$cate_news_data[$cate_name][0] = $this->get_category_first_news($cate_id, false);
    	}

    	//$this->pre($cate_news_data);exit;
    	/*echo '<style>@font-face {
		font-family:"shruti-Regular";
		src:url("../app/webroot/fonts/shruti.ttf");
		}
		@font-face {
		font-family:"gujlekha";
		src:url("../app/webroot/fonts/GujLekha_1.ttf");
		}
		@font-face {
		font-family:"MyriadPro BoldCond";
		src:url("../app/webroot/fonts/MyriadPro-BoldCond.otf");
		}
		*{
			color:red !important;
			font-family:"gujlekha" !important;
			font-weight: normal !important;
		 }
		</style>';*/
		echo '<meta http-equiv="content-type" content="text/html;charset=UTF-8">';
		//echo '<meta http-equiv="content-type" content="application/*;charset=UTF-8">';
    	echo json_encode($cate_news_data, JSON_UNESCAPED_UNICODE);exit;
    	//echo json_encode($result, JSON_UNESCAPED_UNICODE);

    	//$this->pre($cate_news_data);exit;

    	//$this->set('result', $cate_news_data);

    	//$this->render('/Api/result');
    	//exit;

    }
    // for home page - end


    // for category listing page - start
    public function get_category_news_listing($category_id = 1, $page = 1)
    {
    	$this->loadmodel('News');
    	$this->loadmodel('NewsCategory');

    	$latest_newscate_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$category_id), 'order' => array('id' => 'desc')));

    	//$this->pre($latest_newscate_data);exit;

    	$category_name = $latest_newscate_data['NewsCategory']['name'];

    	$latest_news_data = $this->News->find('all', array('conditions' => array('status IN'=> array(1), 'FIND_IN_SET(\''.$category_id.'\',categories)'), 'limit' => 5, 'page' => $page, 'order' => array('id' => 'desc')));

    	//$this->pre($latest_news_data);exit;

    	echo '<meta http-equiv="content-type" content="text/html;charset=UTF-8">';
        //echo '<meta http-equiv="content-type" content="application/*;charset=UTF-8">';
        echo json_encode($latest_news_data, JSON_UNESCAPED_UNICODE);exit;

        //echo json_encode($latest_news_data);exit;

    }
    // for category listing page - end


    // for news details page - start
    public function get_news_detail($news_id = 1)
    {
    	$this->loadmodel('News');
    	$this->loadmodel('NewsCategory');

    	$latest_newscate_data = $this->NewsCategory->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$category_id), 'order' => array('id' => 'desc')));

    	//$this->pre($latest_newscate_data);exit;

    	$category_name = $latest_newscate_data['NewsCategory']['name'];

    	$news_detail_data = $this->News->find('first', array('conditions' => array('status IN'=> array(1), 'id'=>$news_id)));

    	//$this->pre($news_detail_data);exit;

        echo '<meta http-equiv="content-type" content="text/html;charset=UTF-8">';
        //echo '<meta http-equiv="content-type" content="application/*;charset=UTF-8">';
        echo json_encode($news_detail_data, JSON_UNESCAPED_UNICODE);exit;

    	//echo json_encode($news_detail_data);exit;

    }
    // for news details page - end

}