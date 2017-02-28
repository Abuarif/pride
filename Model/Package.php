<?php
App::uses('PrideAppModel', 'Pride.Model');
/**
 * Package Model
 *
 * @property ItemType $ItemType
 * @property CampaignOrder $CampaignOrder
 */
class Package extends PrideAppModel {

	public $uploadsDir = 'packages';
	public $fieldName = 'image';
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'item_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
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
		'ItemType' => array(
			'className' => 'ItemType',
			'foreignKey' => 'item_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
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
		'CampaignOrder' => array(
			'className' => 'CampaignOrder',
			'foreignKey' => 'package_id',
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

	protected function _saveUploadedFile($data) {
		if (!empty($data[$this->alias]['file']['tmp_name']) ) {
			//image file upload
			$file = $data[$this->alias]['file'];
			unset($data[$this->alias]['file']);

			// check if file with same path exists
			$destination = WWW_ROOT . $this->uploadsDir . DS . $file['name'];
			if (file_exists($destination)) {
				$newFileName = String::uuid() . '-' . $file['name'];
				$destination = WWW_ROOT . $this->uploadsDir . DS . $newFileName;
			} else {
				$newFileName = $file['name'];
			}

			// remove the extension for title
			if (explode('.', $file['name']) > 0) {
				$fileTitleE = explode('.', $file['name']);
				array_pop($fileTitleE);
				$fileTitle = implode('.', $fileTitleE);
			} else {
				$fileTitle = $file['name'];
			}

			$data[$this->alias][$this->fieldName] = $newFileName;
			//$data[$this->alias]['slug'] = $newFileName;
			//$data[$this->alias]['mime_type'] = $file['type'];
			//$data[$this->alias]['type'] = $this->type;
			//$data[$this->alias]['path'] = '/' . $this->uploadsDir . '/' . $newFileName;
			// move the file
			$moved = move_uploaded_file($file['tmp_name'], $destination);
		}
		
		if (!empty($data[$this->alias]['src_file']['tmp_name']) ) {
			//source file upload
			$src_file = $data[$this->alias]['src_file'];
			unset($data[$this->alias]['src_file']);

			// check if file with same path exists
			$destination = WWW_ROOT . $this->uploadsDir . DS . $src_file['name'];
			if (file_exists($destination)) {
				$newFileName = String::uuid() . '-' . $src_file['name'];
				$destination = WWW_ROOT . $this->uploadsDir . DS . $newFileName;
			} else {
				$newFileName = $src_file['name'];
			}

			// remove the extension for title
			if (explode('.', $src_file['name']) > 0) {
				$fileTitleE = explode('.', $src_file['name']);
				array_pop($fileTitleE);
				$fileTitle = implode('.', $fileTitleE);
			} else {
				$fileTitle = $src_file['name'];
			}

			$data[$this->alias][$this->fieldName2] = $newFileName;
			//$data[$this->alias]['slug'] = $newFileName;
			//$data[$this->alias]['mime_type'] = $file['type'];
			//$data[$this->alias]['type'] = $this->type;
			//$data[$this->alias]['path'] = '/' . $this->uploadsDir . '/' . $newFileName;
			// move the file
			$moved = move_uploaded_file($src_file['tmp_name'], $destination);
		}
		if ($moved) {
			return $data;
		}

		return false;
	}




	/**
	 * Saves model data
	 *
	 * @see Model::save()
	 */
	public function save($data = null, $validate = true, $fieldList = array()) {
		if (!empty($data[$this->alias]['file']['tmp_name']) || !empty($data[$this->alias]['src_file']['tmp_name'])  ) {
			$data = $this->_saveUploadedFile($data);
		}
		if (!$data) {
			return $this->invalidate('file', __d('croogo', 'Error during file upload'));
		}

		return parent::save($data, $validate, $fieldList);
	}
}
