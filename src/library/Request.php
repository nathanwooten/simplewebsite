<?php

namespace nathanwooten;

use nathanwooten\RequestItemInterface;

class Request implements RequestItemInterface {

	public function __construct()
	{

		$this->request = trim( parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH ), '/' );

	}

	public function get()
	{

		$request = empty( $this->request ) ? 'Home' : $this->request;

		return $request;

	}

	public function getTitle() {

		$request = $this->get();

		if ( false !== strpos( $request, '/' ) ) {
			$explode = explode( '/', trim( $request, '/' ) );
			$request = array_pop( $explode );
		}

		$title = $request;
		return $title;

	}

	public function pull()
	{

		$content = ( new ContentRequestToContent )->to( $this );
		if ( ! $content ) {
			throw new Exception( 'Unable to parse request' );
		}

		return $content;

	}

}
