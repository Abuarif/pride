<?php
App::uses('PrideAppModel', 'Pride.Model');
/**
 * OrganizationShareholder Model
 *
 * @property Organization $Organization
 */
class OrganizationShareholder extends PrideAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'is_director' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_shareholder' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_active_personal' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function beforeSave($options = array()) {
		if (!empty($this->data['OrganizationShareholder']['shareholding'])) {
			$this->data['OrganizationShareholder']['shareholding'] = $this->cleanData($this->data['OrganizationShareholder']['shareholding']);
		}
		
		return true;
	}
	
	public function cleanData($a) {
		$a = str_replace(',', '', $a);
		return $a;

	}
}
