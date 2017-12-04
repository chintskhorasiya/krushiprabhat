<?php
class PollsController extends AppController
{
	var $name = 'Polls';
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
		//echo "in Polls:lists";exit;
		$userid = $this->Session->read(md5(SITE_TITLE) . 'USERID');

        $this->paginate = array(
            'conditions' => array('user_id'=>$userid, 'status IN'=> array(0,1)),
            'limit' => 25,
            'order' => array('id' => 'desc')
        );

        $polls_data = $this->paginate('Poll');

        //$this->pre($polls_data);exit;

        $this->set('page_heading','Polls List');
        $this->set('polls_data',$polls_data);

	}

	public function admin_add() {

		if (!empty($this->data))
		{
			$customValidate = true;

			$userid = (int) $this->Session->read(md5(SITE_TITLE) . 'USERID');

			//$this->pre($this->data['Poll']);exit;
			
			$insert_polls_data_array = $this->data['Poll'];
			$insert_polls_data_array['created'] = date('Y-m-d H:i:s');
			$insert_polls_data_array['modified'] = date('Y-m-d H:i:s');
			$insert_polls_data_array['user_id'] = $userid;
			//$this->pre($insert_polls_data_array);exit;

			$this->Poll->set($insert_polls_data_array);

			if ($this->Poll->validates() && $customValidate) //$this->Poll->validates() && 
			{
				//echo "validates true";exit;
				//$this->pre($insert_polls_data_array);exit;
			 	$save = $this->Poll->save($insert_polls_data_array, true);
				$_SESSION['success_msg'] = "Poll Added Successfully";
                $this->redirect(DEFAULT_ADMINURL . 'polls/lists/');
			}
			else
			{

				$save_errors = $this->Poll->validationErrors;

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

			    $errors_html .= "</ul>";

			    $polls_data['Poll'] = $this->data['Poll'];
			    
			    $_SESSION['error_msg'] = $errors_html;
			    $this->set('polls_data',$polls_data);
			    //$this->redirect(DEFAULT_ADMINURL . 'pages/add/');
			}
		}
		else
		{
			$insert_polls_data_array = array();
			$insert_polls_data_array['Poll']['title'] = '';
			$insert_polls_data_array['Poll']['slug'] = '';
			$insert_polls_data_array['Poll']['content'] = '';
			$insert_polls_data_array['Poll']['status'] = '1';
			
			$this->set('polls_data',$insert_polls_data_array);
		}

	}

	public function admin_edit() {

		$pollId = $this->params['named']['pollId'];

		if (!empty($this->data))
		{
			//if($this->data['btn_save_page'] == "Save News")
			//{

				$userid = (int) $this->Session->read(md5(SITE_TITLE) . 'USERID');
				
				$insert_polls_data_array = $this->data['Poll'];
				$insert_polls_data_array['id'] = $pollId;
				$insert_polls_data_array['modified'] = date('Y-m-d H:i:s');
				$insert_polls_data_array['user_id'] = $userid;
				//$this->pre($insert_polls_data_array);exit;

				//$this->pre($insert_polls_data_array);exit;

				$this->Poll->set($insert_polls_data_array);

				if ($this->Poll->validates())
				{
					//echo "validates true";exit;
				 	//$save = $this->Poll->save($insert_polls_data_array);
					//$_SESSION['success_msg'] = "News Added Successfully";
	                //$this->redirect(DEFAULT_ADMINURL . 'polls/lists/');

	                $this->Poll->save($insert_polls_data_array);
					$_SESSION['success_msg'] = "Poll Updated Successfully";
	                $this->redirect(DEFAULT_ADMINURL . 'polls/lists/');
				}
				else
				{
				    $save_errors = $this->Poll->validationErrors;

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
				    //$this->pre($this->data['Poll']);exit;

				    $_SESSION['error_msg'] = $errors_html;
				    $this->set('polls_data',$this->data);
				    //$this->redirect(DEFAULT_ADMINURL . 'pages/add/');
				}

			//}
		}
		
		$polls_data = $this->Poll->find('first', array('conditions' => array('id' => $pollId)));
		$this->set('polls_data',$polls_data);
	}

	public function admin_delete() {

		$pollId = $this->params['named']['pollId'];
		
		$this->Poll->id = $this->Poll->field('id', array('id' => $pollId));

		$this->Poll->saveField('status', 2);
		$modified_date = date('Y-m-d H:i:s');
		$this->Poll->saveField('modified_date', $modified_date);

		$_SESSION['success_msg'] = "Successfully deleted poll";
		$return_url = DEFAULT_ADMINURL.'polls/lists';
		return $this->redirect($return_url);  
	}

	public function admin_delete_selected()
	{
		//$this->pre($this->data['newss_checks']);exit;
		if(isset($this->data['polls_checks']))
        {
            $pollsSelectedArr = $this->data['polls_checks'];
            $pollsNum = count($pollsSelectedArr);

            if($pollsNum > 0)
            {
                //$this->loadmodel('Product');

                $deletedCount = 0;

                foreach ($pollsSelectedArr as $pollDelKey => $pollToDelete) {
                    //var_dump($pollToDelete);

                    $this->Poll->id = $this->Poll->field('id', array('id' => $pollToDelete));
                    if ($this->Poll->id)
                    {
                        //$this->pre($this->Product);exit;
                        $thisDelete = $this->Poll->saveField('status', 2);
                        $modified_date = date('Y-m-d H:i:s');
                        $thisDeleteMod = $this->Poll->saveField('modified_date', $modified_date);

                        if($thisDelete && $thisDeleteMod){
                            $deletedCount++;
                        }

                    }
                }

                $_SESSION['success_msg'] = "Successfully deleted for ".$deletedCount." polls.";
                $return_url = DEFAULT_ADMINURL.'polls/lists';
                return $this->redirect($return_url);    
            }
            else
            {
                $_SESSION['error_msg'] = "You have not selected any polls.";
                $return_url = DEFAULT_ADMINURL.'polls/lists';
                return $this->redirect($return_url);    
            }
        }
        else
        {
            $return_url = DEFAULT_ADMINURL.'polls/lists';
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
	         	$search_key = trim($this->request->data['pollSearch']['searchtitle']);
	 
	         	$conditions[] = array(
	         		"OR" => array(
	            		"Poll.question LIKE" => "%".$search_key."%",
	            		"Poll.answer1 LIKE" => "%".$search_key."%",
	            		"Poll.answer2 LIKE" => "%".$search_key."%"
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

	   	$polls_data = $this->paginate('Poll');

	   	//$this->pre($polls_data);exit;

	   	$this->set('page_heading','Polls List');

	   	$this->set('polls_data',$polls_data);

	   	$this->set('from_search',true);

	   	$this->render('/Polls/admin_lists');
	}

}