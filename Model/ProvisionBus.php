<?php
App::uses('PrideAppModel', 'Pride.Model');
/**
 * ProvisionBus Model
 *
 * @property CampaignOrder $CampaignOrder
 * @property Depot $Depot
 * @property Route $Route
 * @property Bus $Bus
 * @property Approval $Approval
 */
class ProvisionBus extends PrideAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'campaign_order_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'order_number' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'depot_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'step1', // Limit validation to 'create' or 'update' operations
			),
		),
		'route_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'step2', // Limit validation to 'create' or 'update' operations
			),
		),
		'bus_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'step3', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'CampaignOrderDetail' => array(
			'className' => 'CampaignOrderDetail',
			'foreignKey' => 'campaign_order_detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		), 
		'Depot' => array(
			'className' => 'Depot',
			'foreignKey' => 'depot_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'RouteDetail' => array(
			'className' => 'Route',
			'foreignKey' => 'route_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Bus' => array(
			'className' => 'Bus',
			'foreignKey' => 'bus_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CampaignDesign' => array(
			'className' => 'CampaignDesign',
			'foreignKey' => 'campaign_design_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
	);
	
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'WorkOrder' => array(
			'className' => 'WorkOrder',
			'foreignKey' => 'provision_bus_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'BusTransaction' => array(
			'className' => 'BusTransaction',
			'foreignKey' => 'provision_bus_id',
			'dependent' => true,
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
