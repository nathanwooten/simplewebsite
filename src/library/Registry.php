<?php

namespace nathanwooten;

class Registry {

	protected static $instance;

	protected static $registry = [];

	public static function set( $name, $data = nll ) {

		static::$registry[ $name ] = $data;

	}

	public static function get( $name )
	{

		if ( array_key_exists( $name, static::$registry ) ) {
			return static::$registry[ $name ];
		}

	}

	public static function all()
	{

		return static::$registry;

	}

	public static function getInstance()
	{

		if ( ! isset( static::$instance ) ) {

			static::$instance = new static;
		}

		return static::$instance;

	}

}
