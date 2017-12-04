<?php
App::uses('AppModel', 'Model');
class Poll extends AppModel {
    
    public $name = 'Poll';

    public $validate = array(
        'question' => array(
            'between' => array(
                'rule' => array('lengthBetween', 5, 255),
                'message' => 'Question can not be empty, And length should be between 5 to 255'
            )
        ),
        'answer1' => array(
            'between' => array(
                'rule' => array('lengthBetween', 2, 50),
                'message' => 'Answer 1 can not be empty, And length should be between 2 to 50'
            )
        ),
        'answer2' => array(
            'between' => array(
                'rule' => array('lengthBetween', 2, 50),
                'message' => 'Answer 2 can not be empty, And length should be between 2 to 50'
            )
        )
    );

}