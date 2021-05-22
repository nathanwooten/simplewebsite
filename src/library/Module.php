<?php

namespace nathanwooten;

use nathanwooten\Controller;

abstract class Module extends Controller
{

	public function __construct( PageController $controller ) {

		$this->controller = $controller;

	}

	abstract function execute() : Response;

	public function get()
	{

		return $this->markup;

	}

	public function getConfig()
	{

		$config = $this->getFile( 'Config', $this->name );
		return $config;

	}

	public function getTemplate()
	{

		$template = $this->getFile( 'Template', $this->name );
		return $template;

	}

	public function getFile( $type, $name, $append = '' )
	{

		$dir = Registry::get( strtoupper( $type ) . 'DIR' );

		$file = $dir . $type . $name . $append . '.php';
		if ( file_exists( $file ) ) {
			$get = 'get' . $type . 'File';
			return $this->$get( $file );
		}

		$file = $dir . $type . $name . '.php';
		if ( file_exists( $file ) ) {
			$get = 'get' . $type . 'File';
			return $this->$get( $file );
		}

	}

	public function getConfigFile( $file = null )
	{

		if ( $file && file_exists( $file ) ) {
			$config = include $file;
			return $config;
		}

	}

	public function getTemplateFile( $file = null )
	{

		if ( $file && file_exists( $file ) ) {
			$template = file_get_contents( $file );
			return $template;
		}

	}

	public function getRequest( Request $request = null ) {

		return $this->getController()->getRequest();

	}

	public function getResponse( Response $response = null ) {

		if ( !isset( $this->response ) ) {
			$this->response = new Response;
		}

		return $this->response;

	}

	public function getController()
	{

		return $this->controller;

	}

}
