<?php

namespace nathanwooten;

use nathanwooten\ContentInterface;

class ContentPullFile implements ContentInterface {

	public static function pull( $file )
	{

		return file_get_contents( $file );

	}

}
