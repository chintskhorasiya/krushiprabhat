<?php
class EpapersController extends AppController
{
	var $name = 'Epapers';
    public $components = array('Cookie', 'Session', 'Email', 'Paginator');
    public $helpers = array('Html', 'Form', 'Session', 'Time');

    public function admin_lists()
	{
		//echo "in Advertises:lists";exit;
		$userid = $this->Session->read(md5(SITE_TITLE) . 'USERID');

        $this->paginate = array(
            'conditions' => array('user_id'=>$userid, 'status IN'=> array(0,1)),
            'limit' => 25,
            'order' => array('id' => 'desc')
        );

        $epapers_data = $this->paginate('Epaper');

        $this->set('page_heading','E-Papers');
        $this->set('epapers_data',$epapers_data);

	}

	public function admin_add() {

		if (!empty($this->data))
		{
			$userid = (int) $this->Session->read(md5(SITE_TITLE) . 'USERID');
			
			$insert_epapers_data_array = $this->data['Epaper'];
			$insert_epapers_data_array['created'] = date('Y-m-d H:i:s');
			$insert_epapers_data_array['modified'] = date('Y-m-d H:i:s');
			$insert_epapers_data_array['user_id'] = $userid;

			//$insert_epapers_data_array['source'] = "some image";
			//$insert_epapers_data_array['link'] = "http://www.google.com";
			//$insert_epapers_data_array['position'] = "home_top_left";

			//$this->pre($insert_epapers_data_array);exit;

			$this->Epaper->set($insert_epapers_data_array);

			//$this->pre($insert_epapers_data_array);exit;

			/*echo "invalidFields:";
			$this->pre($this->Epaper->invalidFields());
			echo "<br><br>";exit;
*/
			if ($this->Epaper->validates())
			{
				//$this->pre($this->Epaper->data);exit;
				// check if file has been uploaded, if so get the file path
				if (!empty($this->Epaper->data['Epaper']['filepath']) && is_string($this->Epaper->data['Epaper']['filepath'])) {
					$insert_epapers_data_array['epaper'] = $this->Epaper->data['Epaper']['filepath'];
				}
				//echo "validates true";exit;
				//$this->pre($insert_epapers_data_array);exit;
			 	$save = $this->Epaper->save($insert_epapers_data_array, false);
				$_SESSION['success_msg'] = "E-Paper Added Successfully";
                $this->redirect(DEFAULT_ADMINURL . 'epapers/lists/');
			}
			else
			{
			    $save_errors = $this->Epaper->validationErrors;

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
			    //$this->pre($this->data['Epaper']);exit;

			    $_SESSION['error_msg'] = $errors_html;
			    $this->set('epapers_data',$this->data);
			    //$this->redirect(DEFAULT_ADMINURL . 'pages/add/');
			}
		}
		else
		{
			$insert_epapers_data_array = array();
			$insert_epapers_data_array['Epaper']['title'] = '';
			$insert_epapers_data_array['Epaper']['status'] = '1';
			$this->set('epapers_data',$insert_epapers_data_array);
		}

	}

	public function admin_edit() {

		$epaperId = $this->params['named']['epaperId'];

		if (!empty($this->data))
		{
			//if($this->data['btn_save_page'] == "Save Advertise")
			//{

				$userid = (int) $this->Session->read(md5(SITE_TITLE) . 'USERID');
				
				$insert_epapers_data_array = $this->data['Epaper'];
				$insert_epapers_data_array['id'] = $epaperId;
				//$insert_epapers_data_array['created'] = date('Y-m-d H:i:s');
				$insert_epapers_data_array['modified'] = date('Y-m-d H:i:s');
				$insert_epapers_data_array['user_id'] = $userid;
				//$this->pre($insert_epapers_data_array);exit;

				//$insert_epapers_data_array['source'] = "some image";
				//$insert_epapers_data_array['link'] = "http://www.google.com";
				//$insert_epapers_data_array['position'] = "home_top_left";

				//$this->pre($insert_epapers_data_array);exit;
				$this->Epaper->set($insert_epapers_data_array);

				if ($this->Epaper->validates())
				{
					//echo "validates true";exit;
				 	//$save = $this->Epaper->save($insert_epapers_data_array);
					//$_SESSION['success_msg'] = "Advertise Added Successfully";
	                //$this->redirect(DEFAULT_ADMINURL . 'epapers/lists/');
					if (!empty($insert_epapers_data_array['epaper']['error']) && $insert_epapers_data_array['epaper']['error']==4 && $insert_epapers_data_array['epaper']['size']==0) {
			            //echo "flgkmdfklg";exit;
			            unset($insert_epapers_data_array['epaper']);
			        } else {
			        	// check if file has been uploaded, if so get the file path
						if (!empty($this->Epaper->data['Epaper']['filepath']) && is_string($this->Epaper->data['Epaper']['filepath'])) {
							$insert_epapers_data_array['epaper'] = $this->Epaper->data['Epaper']['filepath'];
						}
			        }

					//$this->pre($insert_epapers_data_array);exit;

	                

					$this->Epaper->save($insert_epapers_data_array, false);
					$_SESSION['success_msg'] = "E-Paper Updated Successfully";
	                $this->redirect(DEFAULT_ADMINURL . 'epapers/lists/');
				}
				else
				{
				    $save_errors = $this->Epaper->validationErrors;

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
				    //$this->pre($this->data['Epaper']);exit;

				    $_SESSION['error_msg'] = $errors_html;
				    $this->set('epapers_data',$this->data);
				    //$this->redirect(DEFAULT_ADMINURL . 'pages/add/');
				}

			//}
		}
		
		$epapers_data = $this->Epaper->find('first', array('conditions' => array('id' => $epaperId)));

		$this->set('epapers_data',$epapers_data);
	}

	public function admin_delete() {

		$epaperId = $this->params['named']['epaperId'];
		
		$this->Epaper->id = $this->Epaper->field('id', array('id' => $epaperId));

		$this->Epaper->saveField('status', 2);
		$modified_date = date('Y-m-d H:i:s');
		$this->Epaper->saveField('modified_date', $modified_date);

		$_SESSION['success_msg'] = "Successfully deleted E-Paper";
		$return_url = DEFAULT_ADMINURL.'epapers/lists';
		return $this->redirect($return_url);  
	}

	public function admin_delete_selected()
	{
		//$this->pre($this->data['pages_checks']);exit;
		if(isset($this->data['epapers_checks']))
        {
            $epapersSelectedArr = $this->data['epapers_checks'];
            $epapersNum = count($epapersSelectedArr);

            if($epapersNum > 0)
            {
                //$this->loadmodel('Product');

                $deletedCount = 0;

                foreach ($epapersSelectedArr as $pageDelKey => $pageToDelete) {
                    //var_dump($pageToDelete);

                    $this->Epaper->id = $this->Epaper->field('id', array('id' => $pageToDelete));
                    if ($this->Epaper->id)
                    {
                        //$this->pre($this->Product);exit;
                        $thisDelete = $this->Epaper->saveField('status', 2);
                        $modified_date = date('Y-m-d H:i:s');
                        $thisDeleteMod = $this->Epaper->saveField('modified_date', $modified_date);

                        if($thisDelete && $thisDeleteMod){
                            $deletedCount++;
                        }

                    }
                }

                $_SESSION['success_msg'] = "Successfully deleted ".$deletedCount." E-Paper(s).";
                $return_url = DEFAULT_ADMINURL.'epapers/lists';
                return $this->redirect($return_url);    
            }
            else
            {
                $_SESSION['error_msg'] = "You have not selected any Advertise.";
                $return_url = DEFAULT_ADMINURL.'epapers/lists';
                return $this->redirect($return_url);    
            }
        }
        else
        {
            $return_url = DEFAULT_ADMINURL.'epapers/lists';
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
	         	$search_key = trim($this->request->data['epaperSearch']['searchtitle']);
	 
	         	$conditions[] = array(
	            	"Epaper.title LIKE" => "%".$search_key."%"
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

	    $this->paginate = array(
            'conditions' => $allConditions,
            'limit' => 25,
            'order' => array('id' => 'desc')
        );

        $epapers_data = $this->paginate('Epaper');

        //$this->pre($pages_data);exit;

        $this->set('page_heading','E-Papers List');
        $this->set('epapers_data',$epapers_data);

	   	$this->set('from_search',true);

	   	$this->render('/Epapers/admin_lists');
	}

}