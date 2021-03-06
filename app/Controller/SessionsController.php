<?php
App::uses('AppController', 'Controller');
/**
 *
 * Controller to handle user sessions
 */

class SessionsController extends AppController {

/**
 * User login
 */
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$user = $this->Auth->user();
				$this->Session->setFlash("Welcome {$user['name']}, you are now logged in!", 'alert', array(
					'plugin' => 'TwitterBootstrap',
					'class'  => 'alert-success'
				));
				return $this->redirect($this->Auth->loginRedirect);
			} else {
				$this->Session->setFlash('Invalid login details, please try again.');
				return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'goofed'));
			}
		}
		$this->set('title_for_layout', 'Login');
	}

/**
 * User logout
 */
	public function logout() {
		$this->Session->destroy();
		return $this->redirect($this->Auth->logout());
	}
}