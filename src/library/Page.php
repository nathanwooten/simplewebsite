<?php

namespace nathanwooten;

use nathanwooten\Controller;
use nathanwooten\PageController;
use nathanwooten\Response;
use nathanwooten\TemplateManager;

class Page extends Controller {

	protected $controller = null;

	protected $manager = [];

	protected $blocks = [ 'Content', 'Menu' ];

	public function __construct( PageController $controller )
	{

		$this->setController( $controller );

		$this->manager[ 'Page' ] = new TemplateManager( 'Page', $this->registry()->get( 'TEMPLATEDIR' ) );

	}

	public function execute() : Response
	{

		$templater = $this->getManager( 'Page' );
		foreach ( $this->blocks as $blockName ) {
			$this->addBlock( $blockName );
		}

		$response = $templater->execute();
		return $response;

	}

	public function getRequest( Request $request = null )
	{

		return $this->getController()->getRequest();

	}

	public function getResponse( Response $response = null )
	{

		return $this->getController()->getResponse();

	}

	public function setController( PageController $controller )
	{

		if ( ! isset( $this->controller ) ) {
			$this->controller = $controller;
		}

	}

	public function getController()
	{

		return $this->controller;

	}

	public function setManager( Manager $manager )
	{

		$name = $manager->getName();
		if ( ! isset( $this->manager[ $name ] ) ) {
			$this->manager[ $name ] = $manager;
		}

	}

	public function getManager( $name )
	{

		return array_key_exists( $name, $this->manager ) ? $this->manager[ $name ] : null;

	}

	public function addBlock( $blockName, $baseBlock = 'Page' )
	{

		$templater = $this->getManager( $baseBlock );

			$get = 'get' . $blockName;
		$templater->add( $blockName, $this->$get() );

	}

	public function getContent()
	{

		return $this->getRequest()->pull();

	}

	public function getMenu()
	{

		$menuModule = new ModuleMenu( $this->getController() );
		$menuModule->execute();

		$markup = $menuModule->get();
		return $markup;

	}

}
