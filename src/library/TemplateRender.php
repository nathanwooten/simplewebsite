<?php

namespace nathanwooten;

use nathanwooten\ManagerTemplate;

class TemplateRender
{

	public static $delimiters = [ '{{', '}}' ];

	public static function render( TemplateInterface $template )
	{

		$engine = $template->getManager();
		$markup = $template->getMarkup();

		$globalVars = $engine->getContainer();
		$markup = static::iterate( $globalVars, $markup );

//		$templateVars = $template->getContainer();
//		$templateString = static::iterate( $templateVars, $templateString );

		$file = $engine->getDir() . 'TEMPlate.php';
		$put = file_put_contents( $file, $markup );
		if ( ! $put ) {
			return false;
		}

		extract( $globalVars );
//		extract( $templateVars );

		ob_start();
			include $file;
		$rendered = ob_get_clean();

		$template->setRendered( $rendered );

		return $rendered;

	}

	public static function iterate( array $array, string $templateString ) {

		foreach ( $array as $name => $obj ) {

			$match = static::match( $templateString, $name );
			foreach ( $match as $tag ) {

					$render = static::render( $obj );

				$templateString = str_replace( $tag, $render, $templateString );
			}
		}

		return $templateString;

	}

	public static function match( $template, $specific = null )
	{

		$delimiters = static::delimiters( static::$delimiters );
		$expression = is_null( $specific ) ? '(.*?)' : $specific;

		$regex = '/' . $delimiters[0] . $expression . $delimiters[1] . '/';
		preg_match_all( $regex, $template, $match );

		$match = $match[0];

		return $match;

	}

	public static function delimiters( array $delimiters = [] )
	{

		$delimiters = array_values( $delimiters );
		$delimiters[0] = '\\' . implode( '\\', str_split( $delimiters[0] ) );
		$delimiters[1] = '\\' . implode( '\\', str_split( $delimiters[1] ) );
		return $delimiters;

	}

}
