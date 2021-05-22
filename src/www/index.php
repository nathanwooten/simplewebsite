<?php

namespace nathanwooten;

use Exception;

use nathanwooten\RequestInterface;
use nathanwooten\RouteInterface;
use nathanwooten\RouteItemInterface;

use nathanwooten\Registry;
use nathanwooten\Route;
use nathanwooten\Request;
use nathanwooten\Router;
use nathanwooten\RouterMatch;

if ( ! defined( 'DS' ) ) define( 'DS', DIRECTORY_SEPARATOR );

require_once dirname( dirname( __FILE__ ) ) . DS . 'library' . DS . 'Registry.php';

Registry::set( 'ROOTDIR', 'C:' . DS . 'nathanwooten' . DS );
Registry::set( 'OPSDIR', Registry::get( 'ROOTDIR' ) . 'Operation' . DS );
Registry::set( 'OPDIR', Registry::get( 'OPSDIR' ) . 'Violet' . DS . 'HomeBranch' . DS );
Registry::set( 'PROJECTDIR', Registry::get( 'OPDIR' ) . 'Profordable' . DS . 'Projects' . DS );

Registry::set( 'GODIR', 'Main' . DS . 'src' . DS );
Registry::set( 'WORKINGDIR', 'Dev' . DS . 'Home' . DS . 'src' . DS );

Registry::set( 'USERDIR', dirname( dirname( __FILE__ ) ) . DS );
Registry::set( 'CONFIGDIR', Registry::get( 'USERDIR' ) . 'config' . DS );
Registry::set( 'WWWDIR', Registry::get( 'USERDIR' ) . 'www' . DS );
Registry::set( 'LIBDIR', Registry::get( 'USERDIR' ) . 'library' . DS );
Registry::set( 'CONTENTDIR', Registry::get( 'USERDIR' ) . 'content' . DS );
Registry::set( 'TEMPLATEDIR', Registry::get( 'USERDIR' ) . 'static' . DS . 'template' . DS );
Registry::set( 'INCLUDEDIR', Registry::get( 'USERDIR' ) . 'includes' . DS );

/*
$autoloader = function ( $interface ) {
	$file = str_replace( 'Pf\Templater\\', Registry::get( 'PROJECTDIR' ) . 'Templater' . DS . Registry::get( 'WORKINGDIR' ), $interface ) . '.php';
	if ( ! is_readable( $file ) ) {
		return;
	}
	require_once $file;
};
spl_autoload_register( $autoloader, true, true );
*/

$autoloader = function ( $interface ) {
	$file = str_replace( 'nathanwooten\\', dirname( dirname( __FILE__ ) ) . DS . 'library' . DS, $interface ) . '.php';
	if ( ! is_readable( $file ) ) {
		return;
	}
	require_once $file;
};
spl_autoload_register( $autoloader, true, true );

Registry::set( 'routes', [
	new Route( '*', [ new PageController, 'execute' ] )
] );

$fc = new FrontController( new Request, new Response );
$fc->dispatch();

//$factory = new Factory;

//$controller = $factory->make( 'PageController' );
//$controller->execute();

//$frontController = new FrontController( new Request, new Response );
//$frontController->dispatch();

/*
$request = new Request;
Registry::set( 'request', $request );

$router = new Router;

$callbacks = $router->route( $request );
foreach ( $callbacks as $callback ) {
	$callbackResult = $callback();
	print $callbackResult;
}
*/