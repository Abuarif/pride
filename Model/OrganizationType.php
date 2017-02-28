<?php
App::uses('PrideAppModel', 'Pride.Model');
/**
 * OrganizationType Model
 *
 * @property Organization $Organization
 */
class OrganizationType extends PrideAppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
