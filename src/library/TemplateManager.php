<?php

namespace nathanwooten;

use nathanwooten\Reponse;
use nathanwooten\Template;

class TemplateManager extends Controller {

	protected $name;
	protected $dir;

	protected $container = [];
	protected $set = [
		[ 'Document' ],
		[ 'Header' ],
		[ 'Body' ],
		[ 'Footer' ]
	];

	protected $baseTemplate = null;

	protected $prefix = 'Template';
	protected $extension = '.php';

	protected $add = true;

	public function __construct( $name, $dir )
	{

		$this->name = $name;
		$this->dir = $dir;

	}

	public function execute() : Response
	{

		if ( ! empty( $this->set ) ) {
			$this->setArray();
		}

		$response = $this->getResponse();

		$template = $this->baseTemplate;

		$rendered = $template->render();

		if ( $this->add ) {
			$this->responseAdd( $response, $rendered );
		}

		return $response;

	}

	public function responseAdd( Response $response, string $markup ) {

		$response->add( $markup );

	}

	public function getResponse( Response $response = null )
	{

		return $this->registry()->get( 'PageController' )->getResponse();

	}

	public function set( $name, $source = null )
	{

		$template = false;

		if ( $name instanceof Template ) {
			$template = $name;

			$name = $template->getName();
			
		} else {

			if ( is_null( $source ) ) {
				$source = $this->getDir() . $this->getPrefix() . $name . $this->getExt();
			}

			$qualified = $this->qualify( $name );
			if ( null !== $qualified ) {

				$template = new $qualified( $this, $name, $source );
			}

		}

		if ( $template ) {
			$this->container[ $name ] = $template;

			if ( ! isset( $this->baseTemplate ) ) {
				$this->baseTemplate = $template;
			}

			return;
		}

		throw new Exception( 'Unable to set template' );

	}

	public function get( $name )
	{

		return array_key_exists( $name, $this->container ) ? $this->container[ $name ] : null;

	}

	public function setArray()
	{

		$array = $this->set;

		$this->baseTemplate = $this->set( ...$array[0] );
		array_unshift( $this->set );

		foreach ( $this->set as $key => $templateArray ) {
			$this->set( ...array_values( (array) $templateArray ) );
		}

		$this->set = [];

	}

	public function add( ...$args ) {

		$this->set[] = $args;

	}

	public function qualify( $name )
	{

		$class = __NAMESPACE__ . '\\' . 'Template';
		$specific = $class . $name;

		if ( class_exists( $specific ) ) {
			$class = $specific;
		} elseif ( ! class_exists( $class ) ) {

			throw new Exception( 'Can not qualify the given class name' );
		}

		return $class;

	}

	public function getDir()
	{

		return $this->dir;

	}

	public function getPrefix()
	{

		return $this->prefix;

	}

	public function getExt()
	{

		return $this->extension;

	}

	public function getBaseTemplate()
	{

		return $this->baseTemplate;

	}

	public function getContainer()
	{

		return $this->container;

	}

	public function getName()
	{

		return $this->name;

	}

}
