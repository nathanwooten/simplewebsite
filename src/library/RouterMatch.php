<?php

namespace nathanwooten;

use nathanwooten\RouterMatchInterface;

class RouterMatch implements RouterMatchInterface
{

	public function match( Request $request, Route $route )
	{

		$request = $request->get();
		$match = $route->getRequest();

		if ( $request === $match || '*' === $match ) {
			return $route->getCallback();
		}

	}

}
