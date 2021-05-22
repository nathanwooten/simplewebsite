<?php

namespace nathanwooten;

use nathanwooten\Controller;
use nathanwooten\Request;
use nathanwooten\Response;

class PageController extends Controller {

	protected $manager = [];

	public function __construct( Request $request = null, Response $response = null ) {

		$this->registry()->set( 'PageController', $this );

		$this->setRequest( $request );
		$this->setResponse( $response );

		$this->page = new Page( $this );

	}

	public function execute() : Response
	{

		$this->page->execute();

		$response = $this->getResponse();

		$rendered = $response->render();
		print $rendered;

		return $response;

	}

	public function getPage()
	{

		return $this->page;

	}

}
