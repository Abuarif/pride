<?php
App::uses('PrideAppModel', 'Pride.Model');
/**
 * OrganizationKeyPersonnel Model
 *
 * @property Organization $Organization
 */
class OrganizationKeyPersonnel extends PrideAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'background' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
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
}
