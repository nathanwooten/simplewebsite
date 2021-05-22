<?php

namespace nathanwooten;

use nathanwooten\Registry;

class Router {

	public function route( Request $request, RouterMatch $matcher = null )
	{

		$matches = [];
		$matcher = isset( $matcher ) ? $matcher : new RouterMatch;

		foreach ( Registry::get( 'routes' ) as $route ) {

			$match = $matcher->match( $request, $route );
			if ( $match ) {
				$matches[] = $match;
			}
		}

		return $matches;

	}

}
