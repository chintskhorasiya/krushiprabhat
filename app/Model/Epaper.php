<?php
App::uses('AppModel', 'Model');
class Epaper extends AppModel {
    
    public $name = 'Epaper';

    public $validate = array(
        'title' => array(
            'between' => array(
                'rule' => array('lengthBetween', 5, 255),
                'message' => 'Title can not be empty, And length should be between 5 to 255'
            )
        ),
        'epaper' => array(
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            'fileSize' => array(
                'rule' => array('fileSize', '<=', '2MB'),
                'message' => 'E-Paper must be less than 2MB.',
                'allowEmpty' => true,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            'mimeType' => array(
                'rule' => array('mimeType', array('application/pdf')),
                'message' => 'Invalid file, only PDF allowed',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // custom callback to deal with the file upload
            'processUpload' => array(
                'rule' => 'processUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            )
        )
    );

    /**
     * Upload Directory relative to WWW_ROOT
     * @param string
     */
    public $uploadDir = 'img/uploads/epapers';

    /**
     * Process the Upload
     * @param array $check
     * @return boolean
     */
    public function processUpload($check=array()) {

        if(empty($this->data['Epaper']['id']))
        {
            $lastRecord = $this->find('first', array('columns' => array('id'), 'order' => 'id DESC'));
            //var_dump($lastRecord);exit;
            if(count($lastRecord)>0){
                $lastId = (int) $lastRecord['Epaper']['id'];
                $lastId++;
            } else {
                $lastId = 1;
            }
        } else {
            $lastId = $this->data['Epaper']['id'];
        }

        $this->uploadDir = $this->uploadDir.'/'.$lastId;

        //echo $this->uploadDir;
        //echo '<pre>';print_r($this->data); print_r($check);exit;
        // deal with uploaded file
        if (!empty($check['epaper']['tmp_name'])) {

            // check file is uploaded
            if (!is_uploaded_file($check['epaper']['tmp_name'])) {
                return FALSE;
            }

            $images_move_dir = WWW_ROOT . $this->uploadDir . DS;

            if (!is_dir($images_move_dir)) {
                $oldmask = umask(0);
                mkdir($images_move_dir, 0777, true);
                chmod($images_move_dir, 0755);
                umask($oldmask);
            }

            // build full filename
            $filename = $images_move_dir . Inflector::slug(pathinfo($check['epaper']['name'], PATHINFO_FILENAME)).'.'.pathinfo($check['epaper']['name'], PATHINFO_EXTENSION);

            // @todo check for duplicate filename

            // try moving file
            if (!move_uploaded_file($check['epaper']['tmp_name'], $filename)) {
                return FALSE;

            // file successfully uploaded
            } else {
                // save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
                $this->data[$this->alias]['filepath'] = DEFAULT_URL.str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename) );

                //var_dump($this->data[$this->alias]['filepath']);exit;
            }
        }

        return TRUE;
    }

    /**
     * Before Save Callback
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {
        // a file has been uploaded so grab the filepath
        if (!empty($this->data[$this->alias]['filepath'])) {
            $this->data[$this->alias]['filepath'] = $this->data[$this->alias]['filepath'];
        }
        
        return parent::beforeSave($options);
    }

    /**
     * Before Validation
     * @param array $options
     * @return boolean
     */
    public function beforeValidate($options = array()) {
        // ignore empty file - causes issues with form validation when file is empty and optional
        if (!empty($this->data[$this->alias]['epaper']['error']) && $this->data[$this->alias]['epaper']['error']==4 && $this->data[$this->alias]['epaper']['size']==0) {
            //echo "flgkmdfklg";exit;
            unset($this->data[$this->alias]['epaper']);
        }

        parent::beforeValidate($options);
    }
    
}