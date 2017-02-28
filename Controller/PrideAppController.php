<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class PrideAppController extends AppController {

	public $components = array('RequestHandler');
	
	public function active_view() {}
	
	public function beforeRender() {

		if ($this->Session->check('Auth.User')){
			$this->layout = 'registered';
			if ($this->Session->read('Auth.User.role_id') == 1) {
				$this->layout = 'admin';
			}
		} else {
			$this->layout = 'default';
		}
	}

	public function getSenderEmail() {
		return Configure::read('AMS.email_from').'@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
	}
	
	public function sendEmail($from, $users, $subject, $template, $emailType, $theme = null, $viewVars = null) {
		if (is_null($theme)) {
			$theme = $this->theme;
		}
		$success = false;

		try {
			$email = new CakeEmail();
			$email->emailFormat('html');
			$email->from($from[1], $from[0]);
			if (count($users) > 1) 
				$email->to($users);
			else {
				foreach($users as $user) {
					$email->addTo($user);
				}
			}
			$email->subject($subject);
			$email->template($template);
			$email->viewVars($viewVars);
			$email->theme($theme);
			$success = $email->send();
		} catch (SocketException $e) {
			$this->log(sprintf('Error sending %s notification : %s', $emailType, $e->getMessage()));
		}

		return $success;
	}
}
