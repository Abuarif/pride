<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('DocumentReferencesController', 'Pride.Controller');
/**
 * OrganizationAttachments Controller
 *
 * @property OrganizationAttachment $OrganizationAttachment
 * @property PaginatorComponent $Paginator
 */
class OrganizationAttachmentsController extends PrideAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrganizationAttachment->recursive = 0;
		$this->set('organizationAttachments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrganizationAttachment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization attachment'));
		}
		$options = array('conditions' => array('OrganizationAttachment.' . $this->OrganizationAttachment->primaryKey => $id));
		$this->set('organizationAttachment', $this->OrganizationAttachment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
		
			$this->request->data['OrganizationAttachment']['organization_id'] = $this->Session->read('Auth.User.Organization.id');
			
			$doc = new DocumentReferencesController;
			$myDoc = $doc->DocumentReference->findById($this->request->data['OrganizationAttachment']['document_reference_id']);
			$this->request->data['OrganizationAttachment']['name'] = $myDoc['DocumentReference']['name'];
			
			// find duplication doc
			/* $filter = array('conditions' => array(
			'OrganizationAttachment.organization_id' => $this->Session->read('Auth.User.Organization.id'), 
			'OrganizationAttachment.document_reference_id' => $this->request->data['OrganizationAttachment']['document_reference_id']
			));
			$duplicateDoc = $doc->DocumentReference->find('first', $filter); */
			
			$duplicateDoc = $this->OrganizationAttachment->findAllByOrganizationIdAndDocumentReferenceId($this->Session->read('Auth.User.Organization.id'), $this->request->data['OrganizationAttachment']['document_reference_id']);
			
			/* $duplicateDoc = $this->OrganizationAttachment->findAllByOrganizationIdAndDocumentReferenceId('81','3'); */
			
			
			/* echo "Result: ";
			print_r($duplicateDoc);
			die;
			 */
			if (empty($duplicateDoc)) { //not duplicate document_reference_id by same organization_id
				$this->OrganizationAttachment->create();
				if ($this->OrganizationAttachment->save($this->request->data)) {
					$this->Session->setFlash(__d('croogo', 'The document successfully uploaded.'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'upload_documentation',$this->Session->read('Auth.User.organization_id')));
				} else {
					$this->Session->setFlash(__d('croogo', 'The document could not be uploaded. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			} else {
				$this->Session->setFlash(__d('croogo', 'You have uploaded this document. Please, choose other document Type.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$organizations = $this->OrganizationAttachment->Organization->find('list');
		$documentReferences = $this->OrganizationAttachment->DocumentReference->find('list');
		$this->set(compact('organizations', 'documentReferences'));
	}

	public function add_doc($document_reference_id = null) {
		if ($this->request->is('post')) {
		
			$this->request->data['OrganizationAttachment']['organization_id'] = $this->Session->read('Auth.User.Organization.id');
			
			$doc = new DocumentReferencesController;
			$myDoc = $doc->DocumentReference->findById($document_reference_id);
			$this->request->data['OrganizationAttachment']['name'] = $myDoc['DocumentReference']['name'];
			$this->request->data['OrganizationAttachment']['doc_type'] = $myDoc['DocumentReference']['doc_type'];
			
			// find duplication doc
			
			$duplicateDoc = $this->OrganizationAttachment->findAllByOrganizationIdAndDocumentReferenceId($this->Session->read('Auth.User.Organization.id'), $document_reference_id);
			
			if (empty($duplicateDoc)) { //not duplicate document_reference_id by same organization_id
				$this->OrganizationAttachment->create();
				if ($this->OrganizationAttachment->save($this->request->data)) {
					$this->Session->setFlash(__d('croogo', 'The document successfully uploaded.'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'upload_documentation',$this->Session->read('Auth.User.organization_id')));
				} else {
					$this->Session->setFlash(__d('croogo', 'The document could not be uploaded. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			} else {
				$this->Session->setFlash(__d('croogo', 'You have uploaded this document. Please, choose other document Type.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$organizations = $this->OrganizationAttachment->Organization->find('list');
		$documentReferences = $this->OrganizationAttachment->DocumentReference->find('list');
		$this->set(compact('organizations', 'documentReferences'));
		//$this->set(compact('organizations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrganizationAttachment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization attachment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationAttachment->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization attachment has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization attachment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationAttachment.' . $this->OrganizationAttachment->primaryKey => $id));
			$this->request->data = $this->OrganizationAttachment->find('first', $options);
		}
		$organizations = $this->OrganizationAttachment->Organization->find('list');
		$document_references = $this->OrganizationAttachment->DocumentReference->find('list');
		$this->set(compact('organizations', 'document_references'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OrganizationAttachment->id = $id;
		if (!$this->OrganizationAttachment->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization attachment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationAttachment->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization attachment deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('controller' => 'organizations', 'action' => 'upload_documentation', $this->Session->read('Auth.User.organization_id')));
		}
		$this->Session->setFlash(__d('croogo', 'Organization attachment was not deleted'), 'default', array('class' => 'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OrganizationAttachment->recursive = 0;
		$this->set('organizationAttachments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OrganizationAttachment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization attachment'));
		}
		$options = array('conditions' => array('OrganizationAttachment.' . $this->OrganizationAttachment->primaryKey => $id));
		$this->set('organizationAttachment', $this->OrganizationAttachment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OrganizationAttachment->create();
			if ($this->OrganizationAttachment->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization attachment has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization attachment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$organizations = $this->OrganizationAttachment->Organization->find('list');
		$this->set(compact('organizations'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->OrganizationAttachment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid organization attachment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationAttachment->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The organization attachment has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The organization attachment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('OrganizationAttachment.' . $this->OrganizationAttachment->primaryKey => $id));
			$this->request->data = $this->OrganizationAttachment->find('first', $options);
		}
		$organizations = $this->OrganizationAttachment->Organization->find('list');
		$this->set(compact('organizations'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->OrganizationAttachment->id = $id;
		if (!$this->OrganizationAttachment->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid organization attachment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationAttachment->delete()) {
			$this->Session->setFlash(__d('croogo', 'Organization attachment deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Organization attachment was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function getFilename($organization_id = null, $document_reference_id = null ) {
	
		return $this->OrganizationAttachment->findAllByOrganizationIdAndDocumentReferenceId($organization_id, $document_reference_id);
	
	}
	
	public function count_attachment($organization_id = null ) {
	
		/* $total_attachments = $this->OrganizationAttachment->find("count", array(
			"joins" => array(
				array(
					"table" => "document_references",
					"alias" => "Document",
					'type' => 'inner',
					"conditions" => array(
						'OrganizationAttachment.document_reference_id'  => 'DocumentReference.id',
						'Document.doc_type' => 1,
					)
				)
			),
			'conditions' => array(
				'OrganizationAttachment.organization_id' => $organization_id,
			) 
		));
		 */
		
		
		 $filter = array('conditions' => array(
			'OrganizationAttachment.doc_type' => 1,
			'OrganizationAttachment.organization_id' => $organization_id
		));
		$total_attachments = $this->OrganizationAttachment->find('count', $filter);
		 
		$this->set('total_attachments', $total_attachments);
		return $total_attachments;
	}
}
