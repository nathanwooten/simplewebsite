<?php

namespace nathanwooten;

use nathanwooten\nathanwootenAbstracts;

use nathanwooten\TemplateInterface;
use nathanwooten\TemplageManager;

class Template extends nathanwootenAbstracts implements TemplateInterface {

	protected $name;
	protected $markup;

	protected $rendered = null;

	protected $manager;

	public function __construct( TemplateManager $templateManager, $name, $source ) {

		$this->manager = $templateManager;

		$this->setName( $name );
		$this->setSource( $source );

	}

	public function setName( $name ) {

		$this->name = $name;

	}

	public function getName()
	{

		return $this->name;

	}

	public function setSource( $source )
	{

		if ( is_readable( $source ) ) {
			$source = file_get_contents( $source );
		}

		$this->setMarkup( $source );

	}

	public function setMarkup( $markup )
	{

		$this->markup = $markup;

	}

	public function getMarkup()
	{

		return $this->markup;

	}

	public function setRendered( string $rendered )
	{

		$this->rendered = $rendered;

	}

	public function getRendered()
	{

		return $this->rendered;

	}

	public function render()
	{

		$renderer = new TemplateRender;
		$rendered = $renderer->render( $this );
		return $rendered;

	}

	public function getManager()
	{

		return $this->manager;

	}

}
