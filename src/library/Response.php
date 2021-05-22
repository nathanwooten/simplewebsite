<?php

namespace nathanwooten;

use nathanwooten\nathanwootenInterface;

class Response implements nathanwootenInterface {

	public $body = [];

	public function add( $html = '' )
	{

		$this->body[] = $html;

	}

	public function render()
	{

		$body = implode( "\n", $this->body );
		return $body;

	}

}
