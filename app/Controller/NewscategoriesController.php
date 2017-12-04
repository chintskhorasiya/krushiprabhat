<?php
class NewscategoriesController extends AppController
{
	var $name = 'Newscategories';
    public $components = array('Cookie', 'Session', 'Email', 'Paginator');
    public $helpers = array('Html', 'Form', 'Session', 'Time');


    public function admin_index(){
    	//echo "in Pages:index";exit;
    }

	public function admin_lists()
	{
		//$userid = $this->Session->read(md5(SITE_TITLE) . 'USERID');

        $this->loadmodel('NewsCategory');

        $allcat = $this->NewsCategory->find('all', array('conditions' => array('status IN'=> array(0,1))));

        $total_categories = count($allcat);

        if($total_categories > 0)
        {
        	$this->paginate = array(
	            'conditions' => array('status IN'=> array(0,1)),
	            'limit' => 25,
	            'order' => array('id' => 'desc')
	        );

        	$news_categories_data = $this->paginate('NewsCategory');

	        $this->set('page_heading','News Categories');
	        $this->set('categories',$news_categories_data);
        }
        else
        {
        	$this->set('page_heading','News Categories');
        	$this->set('categories',array());
        }

	}

	public function admin_add() {

		$this->loadmodel('NewsCategory');

		if (!empty($this->data))
		{
			$userid = (int) $this->Session->read(md5(SITE_TITLE) . 'USERID');
			//$this->pre($this->data['NewsCategory']);exit;
			$insert_category_data_array = $this->data['NewsCategory'];
			$insert_category_data_array['created'] = date('Y-m-d H:i:s');
			$insert_category_data_array['modified'] = date('Y-m-d H:i:s');
			//$insert_category_data_array['user_id'] = $userid;

			//$this->pre($insert_category_data_array);exit;

			$this->NewsCategory->set($insert_category_data_array);

			/*echo "invalidFields:";
			$this->pre($this->Page->invalidFields());
			echo "<br><br>";exit;
*/
			if ($this->NewsCategory->validates())
			{
				//$this->pre($this->NewsCategory);exit;
				//echo "validates true";exit;
			 	$save = $this->NewsCategory->save($insert_category_data_array);
				$_SESSION['success_msg'] = "Category Added Successfully";
                $this->redirect(DEFAULT_ADMINURL . 'newscategories/lists');
			}
			else
			{
			    $save_errors = $this->NewsCategory->validationErrors;

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
			    //$this->pre($this->data['NewsCategory']);exit;

			    $_SESSION['error_msg'] = $errors_html;
			    $this->set('category_data',$this->data);
			    //$this->redirect(DEFAULT_ADMINURL . 'pages/add/');
			}
		}
		else
		{
			$insert_category_data_array = array();
			$insert_category_data_array['NewsCategory']['title'] = '';
			$insert_category_data_array['NewsCategory']['slug'] = '';
			$insert_category_data_array['NewsCategory']['content'] = '';
			$insert_category_data_array['NewsCategory']['status'] = '1';
			$this->set('category_data',$insert_category_data_array);
		}

	}

	public function admin_edit() {

		$this->loadmodel('NewsCategory');

		$catId = $this->params['named']['catId'];

		if (!empty($this->data))
		{
			$insert_category_data_array = $this->data['NewsCategory'];
			$insert_category_data_array['id'] = $catId;
			//$insert_category_data_array['created'] = date('Y-m-d H:i:s');
			$insert_category_data_array['modified'] = date('Y-m-d H:i:s');
			
			$this->NewsCategory->set($insert_category_data_array);

			if ($this->NewsCategory->validates())
			{

                $this->NewsCategory->save($insert_category_data_array);
				$_SESSION['success_msg'] = "Category Updated Successfully";
                $this->redirect(DEFAULT_ADMINURL . 'newscategories/lists');
			}
			else
			{
			    $save_errors = $this->Page->validationErrors;

			    $errors_html = "<ul>";
			    foreach ($save_errors as $error_field => $field_errors)
			    {
					foreach ($field_errors as $err_no => $error)
					{
						$errors_html .= "<li>".$error."</li>";	
					}
			    }

			    $errors_html .= "</ul>";

			    $_SESSION['error_msg'] = $errors_html;
			    $this->set('category_data',$this->data);
			}
		}
		
		$category_data = $this->NewsCategory->find('first', array('conditions' => array('id' => $catId)));

		$this->set('category_data',$category_data);
	}

	public function admin_delete() {

		$this->loadmodel('NewsCategory');

		$catId = $this->params['named']['catId'];
		
		$this->NewsCategory->id = $this->NewsCategory->field('id', array('id' => $catId));

		$this->NewsCategory->saveField('status', 2);
		$modified_date = date('Y-m-d H:i:s');
		$this->NewsCategory->saveField('modified_date', $modified_date);

		$_SESSION['success_msg'] = "Successfully deleted category";
		$return_url = DEFAULT_ADMINURL.'newscategories/lists';
		return $this->redirect($return_url);  
	}

	public function admin_delete_selected()
	{
		$this->loadmodel('NewsCategory');

		//$this->pre($this->data['cat_checks']);exit;
		if(isset($this->data['cat_checks']))
        {
            $catsSelectedArr = $this->data['cat_checks'];
            $catsNum = count($catsSelectedArr);

            if($catsNum > 0)
            {
                //$this->loadmodel('Product');

                $deletedCount = 0;

                foreach ($catsSelectedArr as $catDelKey => $catToDelete) {
                    //var_dump($catToDelete);

                    $this->NewsCategory->id = $this->NewsCategory->field('id', array('id' => $catToDelete));
                    if ($this->NewsCategory->id)
                    {
                        //$this->pre($this->Product);exit;
                        $thisDelete = $this->NewsCategory->saveField('status', 2);
                        $modified_date = date('Y-m-d H:i:s');
                        $thisDeleteMod = $this->NewsCategory->saveField('modified_date', $modified_date);

                        if($thisDelete && $thisDeleteMod){
                            $deletedCount++;
                        }

                    }
                }

                $_SESSION['success_msg'] = "Successfully deleted for ".$deletedCount." category/categories.";
                $return_url = DEFAULT_ADMINURL.'newscategories/lists';
                return $this->redirect($return_url);    
            }
            else
            {
                $_SESSION['error_msg'] = "You have not selected any category.";
                $return_url = DEFAULT_ADMINURL.'newscategories/lists';
                return $this->redirect($return_url);    
            }
        }
        else
        {
            $return_url = DEFAULT_ADMINURL.'newscategories/lists';
            return $this->redirect($return_url);
        }
	}

	public function admin_search()
	{
	    if ($this->request->is('post'))
	    {
	      	if(!empty($this->request->data) && isset($this->request->data) )
	      	{
	         	//$this->pre($this->request->data);exit;
	         	$search_key = trim($this->request->data['newscateSearch']['searchtitle']);
	 
	         	$conditions[] = array(
	         		"OR" => array(
	            		"NewsCategory.name LIKE" => "%".$search_key."%",
	            		"NewsCategory.slug LIKE" => "%".$search_key."%"
	            	)
	         	);

	         	$this->Session->write('searchCond', $conditions);
         		$this->Session->write('search_key', $search_key);
	      	}
	    }

	    $mainConditions = array('status IN'=> array(0,1));

	    if ($this->Session->check('searchCond')) {
	    	$conditions = $this->Session->read('searchCond');
	    	$allConditions = array_merge($mainConditions, $conditions);
	   	} else {
	      	$conditions = null;
	      	$allConditions = array_merge($mainConditions, $conditions);
	   	}

	    $this->loadmodel('NewsCategory');

        $allcat = $this->NewsCategory->find('all', array('conditions' => $allConditions));

        //$this->pre($allcat);exit;

        $total_categories = count($allcat);

        if($total_categories > 0)
        {
        	$this->paginate = array(
	            'conditions' => $allConditions,
	            'limit' => 25,
	            'order' => array('id' => 'desc')
	        );

        	$news_categories_data = $this->paginate('NewsCategory');

	        $this->set('page_heading','News Categories');
	        $this->set('categories',$news_categories_data);
        }
        else
        {
        	$this->set('page_heading','News Categories');
        	$this->set('categories',array());
        }

	   	$this->set('from_search',true);

	   	$this->render('/Newscategories/admin_lists');
	}

}