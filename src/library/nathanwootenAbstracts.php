<?php

namespace nathanwooten;

use nathanwooten\nathanwootenAbstract;

class nathanwootenAbstracts extends nathanwootenAbstract {

	public function factory()
	{

		return new Factory;

	}

	public function registry()
	{

		return new RegistryWrapper;

	}

}
