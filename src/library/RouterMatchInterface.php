<?php

namespace nathanwooten;

use nathanwooten\Request;
use nathanwooten\Route;

interface RouterMatchInterface {

	public function match( Request $request, Route $route );

}
