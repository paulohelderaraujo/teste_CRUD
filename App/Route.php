<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['create'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'create'
		);

		$routes['edit'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'edit'
		);

		$routes['update'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'update'
		);

		

		$this->setRoutes($routes);
	}

}

?>