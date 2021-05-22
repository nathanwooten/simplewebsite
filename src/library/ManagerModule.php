<?php

namespace nathanwooten;

use nathanwooten\Manager;

class ManagerModule extends Manager {

	protected $name = 'Module';

	protected $container = [];

	protected $set = [
		[ 'Menu' ]
	];

	public function qualify( $name ) {

		$moduleName = 'Windows\\' . $name . 'Module';
		return $moduleName;

	}

}
