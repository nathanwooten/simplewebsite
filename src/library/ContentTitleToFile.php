<?php

namespace nathanwooten;

class ContentTitleToFile {

	public static function to( $title )
	{

		$file = Registry::get( 'CONTENTDIR' ) . $title . '.php'; 

		if ( file_exists( $file ) ) {
			return $file;
		}

	}

}
