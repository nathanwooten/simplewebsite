<?php

namespace nathanwooten;

use nathanwooten\Controller;

abstract class Manager extends Controller {

	protected $name;
	protected $container = [];
	protected $set = [];
/*
	public function execute() : Response
	{

		if ( ! empty( $this->set ) ) $this->setArray();

		if ( ! empty( $this->container ) ) {

			foreach ( $this->container as $name => $item ) {

				$item->execute();
			}
		}

		return $this->getResponse();

	}

	public function set( $name )
	{

		$qualified = $this->qualify( $name );

		$args = func_get_args();
		array_shift( $args );

		if ( null !== $qualified ) {
			$this->container[ $name ] = new $qualified( ...$args );
		}

	}

	public function setArray()
	{

		foreach ( $this->set as $key => $array ) {
			$this->set( ...array_values( (array) $array ) );
		}

		$this->set = [];

	}

	public function add( ...$args ) {

		$this->set[] = $args;

	}

	public function getName()
	{

		return $this->name;

	}
*/
}
