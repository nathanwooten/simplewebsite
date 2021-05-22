<?php

namespace nathanwooten;

use nathanwooten\Module;

class ModuleMenu extends Module
{

	protected $name = 'MenuMain';
	protected $markup = '';
	protected $templater;

	public function execute() : Response
	{

		$pageTemplater = $this->getController()->getPage()->getManager( 'Page' );
		$this->templater = $templater = new TemplateManager( $this->name, $pageTemplater->getDir() );

		$items = $this->getFile( 'config', $this->name . 'Items' );
		foreach( $items as $index => $itemArray ) {

			$templater->add( $name, 'menuItem' );

			$templater->setArray();
		}

		return $this->getResponse();

	}

/*
	public function getFile( $type, $name )
	{

		$dir = Registry::get( strtoupper( $type ) . 'DIR' );

		$file = $dir . $type . $name . '.php';
		if ( file_exists( $file ) ) {
			return $file;
		}

		$file = $dir . $type . '.php';
		if ( file_exists( $file ) ) {
			return $file;
		}

	}
*/
/*
	public function getFile( $type, $name, $append = '' )
	{

		$dir = Registry::get( strtoupper( $type ) . 'DIR' );

		$file = $dir . $type . $name . $append . '.php';
		if ( file_exists( $file ) ) {
			return include $file;
		}

		$file = $dir . $type . $name . '.php';
		if ( file_exists( $file ) ) {
			return include $file;
		}

	}

	public function getConfig()
	{

		$dir = Registry::get( 'CONFIGDIR' );
		$type = 'config' . $this->name;

		$file = $dir . $type . $this->request->get() . '.php';
		$config = $this->getFile( $file );
		if ( $config ) {
			return $config;
		}

		$file = $dir . $type . '.php';
		$config = $this->getFile( $file );
		if ( $config ) {
			return $config;
		}

	}

	public function getTemplate()
	{

		$input = func_get_args();
		$item = isset( $input[1] ) ? (bool) $input[1] : false;
		if ( $item ) {
			$append = 'Item';
		}

		$template = parent::getTemplate( $append );
		return $template;

	}














		$name = $this->name . $append;
		$dir = Registry::get( 'TEMPLATEDIR' );

		if ( $item ) {
			$name = $name . 'Item';
		}

		$file = $dir . $name . $this->request->get() . '.php';
		$template = $this->getFile( $file );
		if ( $template ) {
			return $template;
		}

		$file = $dir . 'menu' . '.php';
		$template = $this->getFile( $file );
		if ( $template ) {
			return $template;
		}

	}

	public function getFile( $file = null )
	{

		if ( file_exists( $file ) ) {
			$fileReturn = include $file;
			return $fileReturn;
		}

	}
*/
	public function load()
	{

		$config = $this->getConfig();
		$template = $this->getTemplate();
		$itemTemplate = $this->getTemplate( 'Item' );

//		foreach ( $config as $itemArray ) {

//		}

/*
		$name = 'Menu' . $title;
		$file = $configDir . 'config' . $name . '.php';
		if ( ! file_exists( $file ) ) {
			$file = $configDir . 'configModuleMenu' . '.php';
		}
		$config = include $file;
		$this->items = $config;

		$file = $templateDir . $name . '.php';
		if ( ! file_exists( $file ) ) {
			$file = $templateDir . 'menu' . '.php';
		}

		$menuItem = $templateDir . 'menuItem' . '.php';
		foreach ( $this->items as $key => $itemArray ) {
			extract( $itemArray );			
		}





		$template = new Template( 'menu', $templateString );

		$this->markup = $template;
		return $this->markup;
*/
	}

}
