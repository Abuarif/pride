<?php
App::uses('PrideAppController', 'Pride.Controller');
App::uses('OrganizationsController', 'Pride.Controller');
App::uses('UsersController', 'Users.Controller');
/**
 * User Management Controller
 *
 * @property UserManagement $userManagement
 * @property PaginatorComponent $Paginator
 */
class UserManagementsController extends PrideAppController {

	public function registration() {
	
		$organizations 	= new OrganizationsController;
		$users 			= new UsersController;
		
		// capture both forms from registration view and save it.
		
	
	
	}
	
	
}
