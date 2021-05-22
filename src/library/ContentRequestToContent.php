<?php

namespace nathanwooten;

use nathanwooten\ContentToInterface;

use Exception;

class ContentRequestToContent implements ContentToInterface {

	public function to()
	{

		$input = func_get_args();
		$request = isset( $input[0] ) ? $input[0] : null;
		if ( ! $request ) {
			throw new Exception( 'Please provide a convert' );
		}

		$file = ContentTitleToFile::to( $request->get() );

		if ( ! $file ) {
			throw new Exception( 'File: ' . $file . ', does not exist' );
		}

		$content = ContentPullFile::pull( $file );
		return $content;

	}

}
