<?php

namespace nathanwooten;

use nathanwooten\nathanwootenAbstracts;

abstract class Controller extends nathanwootenAbstracts {

	abstract function execute() : Response;

	public function setRequest( Request $request = null )
	{

		if ( ! isset( $this->request ) && null !== $request ) {
			$this->request = $request;
		}

	}

	public function getRequest( Request $request = null )
	{

		if ( ! isset( $this->request ) ) {
			if ( null === $request ) {
				$this->request = new Request;
			} else {
				$this->request = $request;
			}
		}

		return $this->request;

	}

	public function setResponse( Response $response = null )
	{

		if ( ! isset( $this->response ) && null !== $response ) {
			$this->response = $response;
		}

	}

	public function getResponse( Response $response = null )
	{

		if ( ! isset( $this->response ) ) {
			if ( null === $response ) {
				$this->response = new Response;
			} else {
				$this->response = $response;
			}
		}

		return $this->response;

	}
}
