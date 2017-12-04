<?php
App::uses('AppModel', 'Model');

class NewsCategory extends AppModel {
    
    public $name = 'NewsCategory';
    public $useTable = 'news_categories';

    public $validate = array(
        'name' => array(
            'between' => array(
                'rule' => array('lengthBetween', 5, 255),
                'message' => 'Name can not be empty, And length should be between 5 to 255'
            )
        ),
        'slug' => array(
            'between' => array(
                'rule' => array('lengthBetween', 2, 100),
                'message' => 'Slug can not be empty, And length should be between 2 to 100'
            ),
            'alphaNumericDashUnderscore' => array(
                'rule' => 'alphaNumericDashUnderscore',
                'message' => 'Slug can only be letters, numbers, dash and underscore'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'This slug has already been taken.'
            ),
        )
    );
    
}