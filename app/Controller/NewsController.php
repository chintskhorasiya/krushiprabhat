<?php
class NewsController extends AppController
{
	var $name = 'News';
    public $components = array('Cookie', 'Session', 'Email', 'Paginator');
    public $helpers = array('Html', 'Form', 'Session', 'Time');

    //public function beforeFilter(){
    	//$isAuth = $this->checklogin();
    	//var_dump($isAuth);exit;	
    //}

    public function admin_index(){
    	//echo "in Newss:index";exit;
    }

	public function admin_lists()
	{
		//echo "in News:lists";exit;
		$userid = $this->Session->read(md5(SITE_TITLE) . 'USERID');

        $this->paginate = array(
            'conditions' => array('user_id'=>$userid, 'status IN'=> array(0,1)),
            'limit' => 25,
            'order' => array('id' => 'desc')
        );

        $news_data = $this->paginate('News');

        //$this->pre($pages_data);exit;

        $this->set('page_heading','News List');
        $this->set('news',$news_data);

	}

	public function admin_add() {

		if (!empty($this->data))
		{
			$customValidate = true;

			$userid = (int) $this->Session->read(md5(SITE_TITLE) . 'USERID');

			//$this->pre($this->data['News']);exit;
			
			$insert_news_data_array = $this->data['News'];
			$insert_news_data_array['created'] = date('Y-m-d H:i:s');
			$insert_news_data_array['modified'] = date('Y-m-d H:i:s');
			$insert_news_data_array['user_id'] = $userid;

			// for news categories
			if(is_array($insert_news_data_array['categories']) && count($insert_news_data_array['categories']) > 0)
			{
				$insert_news_data_array['categories'] = implode(',', $insert_news_data_array['categories']);
			}
			else
			{
				$insert_news_data_array['categories'] = '';
				$customValidate = false;
				$customErrors[] = 'Please select one or more categories';
			}
			// for news categories

			$lastRecord = $this->News->find('first', array('colomns' => array('id'), 'order' => 'id DESC'));

			//var_dump($lastRecord);exit;

			$lastId = (int) $lastRecord['News']['id'];
			$lastId++;
			// for news images
			$first_fail_imgs = array();
			if(count($insert_news_data_array['images']) > 0){
				foreach ($insert_news_data_array['images'] as $ff_img_num => $ff_img) {
					//var_dump($ff_img);
					if($ff_img['error'] == "1"){
						$first_fail_imgs[] = $ff_img['name'];
					}
				}

				if(count($first_fail_imgs) > 0){
					
					$insert_news_data_array['images'] = '';
					$customValidate = false;
					$customErrors[] = 'Could not upload, Some problems in images :'.implode(',', $first_fail_imgs);

				} else {
					$images_result = $this->News->processMultipleUpload($insert_news_data_array, $lastId);
					//$this->pre($images_result);exit;
					$fail_imgs = array();

					if(isset($images_result['failed_images']) && count($images_result['failed_images']) > 0){
						foreach ($images_result['failed_images'] as $fail_img_num => $fail_img) {
							$fail_imgs[] = $fail_img;
						}

						$insert_news_data_array['images'] = '';
						$customValidate = false;
						$customErrors[] = 'These images got failed when upload :'.implode(',', $fail_imgs);

					} else {
						$suc_imgs = array();
						if(isset($images_result['succeed_images']) && count($images_result['succeed_images']) > 0){
							foreach ($images_result['succeed_images'] as $suc_img_num => $suc_img) {
								$suc_imgs[] = $suc_img;
							}

							$insert_news_data_array['images'] = implode(',', $suc_imgs);
						} else {
							$insert_news_data_array['images'] = false;
						}
					}
				}
				
			} else {
				$insert_news_data_array['images'] = false;
			}
			// for news images

			//$this->pre($insert_news_data_array);exit;

			// for news videos
			if(isset($insert_news_data_array['videos']) && count($insert_news_data_array['videos']) > 0)
			{
				$real_videos = array();
				foreach ($insert_news_data_array['videos'] as $vid_num => $vid)
				{
					if(!empty($vid)){
						$real_videos[] = $vid;
					}
				}

				if(count($real_videos) > 0){
					$insert_news_data_array['videos'] = implode(',', $real_videos);
				} else {
					$insert_news_data_array['videos'] = false;
				}
			}
			// for news videos

			//$this->pre($insert_news_data_array);exit;

			$this->News->set($insert_news_data_array);

			if ($this->News->validates() && $customValidate) //$this->News->validates() && 
			{
				//echo "validates true";exit;
				//$this->pre($insert_news_data_array);exit;
			 	$save = $this->News->save($insert_news_data_array, true);
				$_SESSION['success_msg'] = "News Added Successfully";
                $this->redirect(DEFAULT_ADMINURL . 'news/lists/');
			}
			else
			{

				$save_errors = $this->News->validationErrors;

			    //$this->pre($save_errors);
			    //$this->pre($customErrors);
			    //exit;

			    $errors_html = "<ul>";
			    foreach ($save_errors as $error_field => $field_errors)
			    {
					foreach ($field_errors as $err_no => $error)
					{
						$errors_html .= "<li>".$error."</li>";	
					}
			    }

			    if(count($customErrors) > 0)
			    {
			    	foreach ($customErrors as $errKey => $custom_error) {
			    		$errors_html .= "<li>".$custom_error."</li>";	
			    	}
			    }

			    /*if(count($imgErrors) > 0)
			    {
			    	foreach ($imgErrors as $imgerror_field => $imgfield_errors)
				    {
						foreach ($imgfield_errors as $imgerr_no => $imgerror)
						{
							$errors_html .= "<li>".$imgerror[0]."</li>";	
						}
				    }
			    }*/

			    $errors_html .= "</ul>";

			    //$this->pre($errors_html);exit;
			    $news_data['News'] = $this->data['News'];

			    $this->loadmodel('NewsCategory');
				$news_categories_data = $this->NewsCategory->find('all', array('conditions' => array('status IN'=> array(0,1))));
				$news_data['News']['all_categories'] = $news_categories_data;

			    //$this->pre($news_data['News']);exit;

			    $_SESSION['error_msg'] = $errors_html;
			    $this->set('news_data',$news_data);
			    //$this->redirect(DEFAULT_ADMINURL . 'pages/add/');
			}
		}
		else
		{
			$insert_news_data_array = array();
			$insert_news_data_array['News']['title'] = '';
			$insert_news_data_array['News']['slug'] = '';
			$insert_news_data_array['News']['content'] = '';
			$insert_news_data_array['News']['status'] = '1';
			
			$this->loadmodel('NewsCategory');
			$news_categories_data = $this->NewsCategory->find('all', array('conditions' => array('status IN'=> array(0,1))));

			//$this->pre($news_categories_data);exit;

			$insert_news_data_array['News']['all_categories'] = $news_categories_data;
			$this->set('news_data',$insert_news_data_array);
		}

	}

	public function admin_edit() {

		$newsId = $this->params['named']['newsId'];

		if (!empty($this->data))
		{
			//if($this->data['btn_save_page'] == "Save News")
			//{

				$userid = (int) $this->Session->read(md5(SITE_TITLE) . 'USERID');
				
				$insert_news_data_array = $this->data['News'];
				$insert_news_data_array['id'] = $newsId;
				$insert_news_data_array['created'] = date('Y-m-d H:i:s');
				$insert_news_data_array['modified'] = date('Y-m-d H:i:s');
				$insert_news_data_array['user_id'] = $userid;
				//$this->pre($insert_news_data_array);exit;

				// for news categories
				if(is_array($insert_news_data_array['categories']) && count($insert_news_data_array['categories']) > 0)
				{
					$insert_news_data_array['categories'] = implode(',', $insert_news_data_array['categories']);
				}
				else
				{
					$insert_news_data_array['categories'] = '';
					$customValidate = false;
					$customErrors[] = 'Please select one or more categories';
				}
				// for news categories

				//$this->pre($insert_news_data_array);exit;

				// for news images
				$first_fail_imgs = array();
				if(count($insert_news_data_array['images']) > 0){
					foreach ($insert_news_data_array['images'] as $ff_img_num => $ff_img) {
						//var_dump($ff_img);
						if($ff_img['error'] == "1"){
							$first_fail_imgs[] = $ff_img['name'];
						}
					}

					if(count($first_fail_imgs) > 0){
						
						$insert_news_data_array['images'] = '';
						$customValidate = false;
						$customErrors[] = 'Could not upload, Some problems in images :'.implode(',', $first_fail_imgs);

					} else {
						$images_result = $this->News->processMultipleUpload($insert_news_data_array, $newsId);
						//$this->pre($images_result);exit;
						$fail_imgs = array();

						if(isset($images_result['failed_images']) && count($images_result['failed_images']) > 0){
							foreach ($images_result['failed_images'] as $fail_img_num => $fail_img) {
								$fail_imgs[] = $fail_img;
							}

							$insert_news_data_array['images'] = '';
							$customValidate = false;
							$customErrors[] = 'These images got failed when upload :'.implode(',', $fail_imgs);

						} else {
							$suc_imgs = array();
							if(isset($images_result['succeed_images']) && count($images_result['succeed_images']) > 0){
								foreach ($images_result['succeed_images'] as $suc_img_num => $suc_img) {
									$suc_imgs[] = $suc_img;
								}

								$insert_news_data_array['images'] = implode(',', $suc_imgs);
							} else {
								$insert_news_data_array['images'] = false;
							}
						}
					}
					
				} else {
					$insert_news_data_array['images'] = false;
				}
				// for news images

				// for edit images only
				if(isset($insert_news_data_array['add_image'])){
					if (count($insert_news_data_array['add_image']) > 0)
					{
						if(!empty($insert_news_data_array['images'])){
							$insert_news_data_array['images'] = explode(',', $insert_news_data_array['images']);
							$insert_news_data_array['images'] = array_merge($insert_news_data_array['add_image'], $insert_news_data_array['images']);
							$insert_news_data_array['add_image'] = false;
							$insert_news_data_array['images'] = implode(',', $insert_news_data_array['images']);
						} else {
							$insert_news_data_array['images'] = $insert_news_data_array['add_image'];
							$insert_news_data_array['add_image'] = false;
							$insert_news_data_array['images'] = implode(',', $insert_news_data_array['images']);
						}
					}
				}
				// for edit images only

				// for news videos
				if(isset($insert_news_data_array['videos']) && count($insert_news_data_array['videos']) > 0)
				{
					$real_videos = array();
					foreach ($insert_news_data_array['videos'] as $vid_num => $vid)
					{
						if(!empty($vid)){
							$real_videos[] = $vid;
						}
					}

					if(count($real_videos) > 0){
						$insert_news_data_array['videos'] = implode(',', $real_videos);
					} else {
						$insert_news_data_array['videos'] = false;
					}
				}
				// for news videos


				//$this->pre($insert_news_data_array);exit;

				$this->News->set($insert_news_data_array);

				if ($this->News->validates())
				{
					//echo "validates true";exit;
				 	//$save = $this->News->save($insert_news_data_array);
					//$_SESSION['success_msg'] = "News Added Successfully";
	                //$this->redirect(DEFAULT_ADMINURL . 'news/lists/');

	                $this->News->save($insert_news_data_array);
					$_SESSION['success_msg'] = "News Updated Successfully";
	                $this->redirect(DEFAULT_ADMINURL . 'news/lists/');
				}
				else
				{
				    $save_errors = $this->News->validationErrors;

				    //$this->pre($save_errors);exit;
				    $errors_html = "<ul>";
				    foreach ($save_errors as $error_field => $field_errors)
				    {
						foreach ($field_errors as $err_no => $error)
						{
							$errors_html .= "<li>".$error."</li>";	
						}
				    }

				    $errors_html .= "</ul>";

				    //$this->pre($errors_html);exit;
				    //$this->pre($this->data['News']);exit;

				    $_SESSION['error_msg'] = $errors_html;
				    $this->set('news_data',$this->data);
				    //$this->redirect(DEFAULT_ADMINURL . 'pages/add/');
				}

			//}
		}
		
		$news_data = $this->News->find('first', array('conditions' => array('id' => $newsId)));

		$this->loadmodel('NewsCategory');
		$news_categories_data = $this->NewsCategory->find('all', array('conditions' => array('status IN'=> array(0,1))));
		$news_data['News']['all_categories'] = $news_categories_data;

		$this->set('news_data',$news_data);
	}

	public function admin_delete() {

		$newsId = $this->params['named']['newsId'];
		
		$this->News->id = $this->News->field('id', array('id' => $newsId));

		$this->News->saveField('status', 2);
		$modified_date = date('Y-m-d H:i:s');
		$this->News->saveField('modified_date', $modified_date);

		$_SESSION['success_msg'] = "Successfully deleted news";
		$return_url = DEFAULT_ADMINURL.'news/lists';
		return $this->redirect($return_url);  
	}

	public function admin_delete_selected()
	{
		//$this->pre($this->data['newss_checks']);exit;
		if(isset($this->data['news_checks']))
        {
            $newsSelectedArr = $this->data['news_checks'];
            $newsNum = count($newsSelectedArr);

            if($newsNum > 0)
            {
                //$this->loadmodel('Product');

                $deletedCount = 0;

                foreach ($newsSelectedArr as $newsDelKey => $newsToDelete) {
                    //var_dump($newsToDelete);

                    $this->News->id = $this->News->field('id', array('id' => $newsToDelete));
                    if ($this->News->id)
                    {
                        //$this->pre($this->Product);exit;
                        $thisDelete = $this->News->saveField('status', 2);
                        $modified_date = date('Y-m-d H:i:s');
                        $thisDeleteMod = $this->News->saveField('modified_date', $modified_date);

                        if($thisDelete && $thisDeleteMod){
                            $deletedCount++;
                        }

                    }
                }

                $_SESSION['success_msg'] = "Successfully deleted for ".$deletedCount." news.";
                $return_url = DEFAULT_ADMINURL.'news/lists';
                return $this->redirect($return_url);    
            }
            else
            {
                $_SESSION['error_msg'] = "You have not selected any news.";
                $return_url = DEFAULT_ADMINURL.'news/lists';
                return $this->redirect($return_url);    
            }
        }
        else
        {
            $return_url = DEFAULT_ADMINURL.'news/lists';
            return $this->redirect($return_url);
        }
	}

	public function admin_search()
	{
	    $userid = $this->Session->read(md5(SITE_TITLE) . 'USERID');

	    if ($this->request->is('post'))
	    {
	      	if(!empty($this->request->data) && isset($this->request->data) )
	      	{
	         	//$this->pre($this->request->data);exit;
	         	$search_key = trim($this->request->data['newsSearch']['searchtitle']);
	 
	         	$conditions[] = array(
	         		"OR" => array(
	            		"News.title LIKE" => "%".$search_key."%",
	            		"News.content LIKE" => "%".$search_key."%"
	            	)
	         	);

	         	$this->Session->write('searchCond', $conditions);
         		$this->Session->write('search_key', $search_key);
	      	}
	    }

	    $mainConditions = array('user_id'=>$userid, 'status IN'=> array(0,1));

	    if ($this->Session->check('searchCond')) {
	    	$conditions = $this->Session->read('searchCond');
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

	   	$this->set('page_heading','News List');

	   	$this->set('news',$news_data);

	   	$this->set('from_search',true);

	   	$this->render('/News/admin_lists');
	}

}