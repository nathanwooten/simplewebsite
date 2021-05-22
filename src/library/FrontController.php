<?php

namespace nathanwooten;

use nathanwooten\nathanwootenAbstracts;
use nathanwooten\Request;
use nathanwooten\Response;
use nathanwooten\ResultHandler;

class FrontController extends nathanwootenAbstracts {

	public function __construct( Request $request, Response $response )
	{

		$this->registry()->set( 'FrontController', $this );

		$router = new Router;

		$this->request = $request;
		$this->response = $response;

		$this->callback = $router->route( $this->request );

	}

	public function dispatch( ResultHandler $resultHandler = null, array $args = null ) {

		foreach ( $this->callback as $key => $callback ) {

			if ( is_array( $callback ) && is_string( $callback[0] ) ) {
				$callback = [ new $callback[0], $callback[1] ];
			}

			if ( ! is_callable( $callback ) ) {
				throw new Exception( 'Callback not callable' );
			}

			$callbackInput = [ $this->request, $this->response, $args ];
			$callback( ...$callbackInput );

		}

	}

}
