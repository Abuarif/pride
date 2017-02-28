<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('PrideAppController', 'Pride.Controller');
/**
 * Utilities Controller
 *
 * @property Utility $Utility
 * @property PaginatorComponent $Paginator
 */
class AMSNotificationsController extends PrideAppController {

/**
 * Sample
 $this->_sendEmail(
					array(Configure::read('Site.title'), 
					$this->_getSenderEmail()),
					$this->request->data['User']['email'],
					__d('croogo', '[%s] Please activate your account', 
					Configure::read('Site.title')),
					'Users.register',
					'user activation',
					$this->theme,
					array('user' => $this->request->data)
				);
				
	Test User List
	1. advertiser1.pride@gmail.com (maf17902)
	2. advertiser2.pride@gmail.com (maf17902)
	3. pc1.pride@gmail.com (maf17902)
	4. pc2.pride@gmail.com (maf17902)
	5. finance1.pride@gmail.com (maf17902)
	6. depot1.pride@gmail.com (maf17902)
	7. depotcrs.prasarana@gmail.com (maf17902)
	
	
 *
 * @var array
 */
	public function getSenderEmail() {
		return 'admin@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
	}
	
	/**
 * Convenience method to send email
 *
 * @param string $from Sender email
 * @param string $to Receiver email
 * @param string $subject Subject
 * @param string $template Template to use
 * @param string $theme Theme to use
 * @param array  $viewVars Vars to use inside template
 * @param string $emailType user activation, reset password, used in log message when failing.
 * @return boolean True if email was sent, False otherwise.
 */
	public function sendEmail($from, $to, $subject, $template, $emailType, $theme = null, $viewVars = null) {
		if (is_null($theme)) {
			$theme = $this->theme;
		}
		$success = false;

		try {
			$email = new CakeEmail();
			$email->from($from[1], $from[0]);
			$email->to($to);
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
