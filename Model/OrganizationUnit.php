<?php
App::uses('PrideAppModel', 'Pride.Model');
/**
 * OrganizationUnit Model
 *
 * @property OrganizationUnit $ParentOrganizationUnit
 * @property Organization $Organization
 * @property OrganizationUnitType $OrganizationUnitType
 * @property OrganizationUnit $ChildOrganizationUnit
 * @property User $User
 */
class OrganizationUnit extends PrideAppModel {

	/**
	 * Behaviors used by the Model
	 *
	 * @var array
	 * @access public
	 */
	public $actsAs = array(
		'Tree',
		'Search.Searchable',
	);
	
	/**
	 * Filter search fields
	 *
	 * @var array
	 * @access public
	 */
	public $filterArgs = array(
		'name' => array('type' => 'like', 'field' => array('OrganizationUnit.name')),
	);

/**
 * Display fields for this model
 *
 * @var array
 */
	protected $_displayFields = array(
		'id',	
		'name',
		'Organization.name' => 'Organization',
		'OrganizationUnitParent.name' => 'Parent Organization Unit',
	);

/**
 * Edit fields for this model
 *
 * @var array
 */
	protected $_editFields = array(
		'parent_id',
		'organization_unit_type_id',
		'organization_id',
		'name',
		'description',
		'address',
		'region',
		'country',
		'pincode',
		'contact_phone_1',
		'contact_email_1',
	);
	
	
	public $belongsTo = array(
		'Pride.Organization', 
		'Pride.OrganizationUnitType', 
		'OrganizationUnitParent' => array(
			'className' => 'pride.OrganizationUnit',
			'foreignKey'   => 'parent_id',
		));
        
        
        public function listByOrganization($orgId, $type = "list"){
            	return $this->find($type, array(
                    'conditions'=>array(
                        'OrganizationUnit.organization_id'=>$orgId)));
        }
	
}
