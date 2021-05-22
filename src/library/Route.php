<?php

namespace nathanwooten;

use nathanwooten\RouteItemInterface;

class Route implements RouteItemInterface
{

	public $title;
	public $callback;
	public $args;

	public function __construct( $title, callable $callback, $args = [] ) {

		$this->title = $title;
		$this->callback = $callback;
		$this->args = $args;

	}

	public function getRequest()
	{

		return $this->title;

	}

	public function getCallback()
	{

		return $this->callback;

	}

	public function getArgs()
	{

		$input = [];

		$args = $this->args;
		foreach ( $args as $key => $arg ) {

			$key = key( $input );
var_dump( $key );
	
		}




	}

	public function setArgs( array $args = null )
	{

		$this->args = (array) $args;

	}

	public function setArg( $index, $value = null )
	{

		$this->args[ $index ] = $value;

	}

}

?>