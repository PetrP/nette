<?php

/**
 * Test: Nette\Environment variables.
 *
 * @author     David Grudl
 * @category   Nette
 * @package    Nette
 * @subpackage UnitTests
 */

use Nette\Environment;



require __DIR__ . '/../initialize.php';



T::dump( Environment::getVariable('foo'), "Getting variable 'foo':" );

try {
	T::dump( Environment::getVariable('tempDir'), "Getting variable 'tempDir':" );

} catch (Exception $e) {
	T::dump( $e );
}


T::note("Defining constant 'APP_DIR':");
define('APP_DIR', '/myApp');

T::dump( Environment::getVariable('appDir'), "Getting variable 'appDir':" );

T::dump( Environment::getVariable('tempDir'), "Getting variable 'tempDir' #2:" );


T::note("Setting variable 'test'...");
Environment::setVariable('test', '%appDir%/test');

T::dump( Environment::getVariable('test'), "Getting variable 'test':" );

T::dump( Environment::getVariables(), "Getting variables:" );


try {
	T::note("Setting circular variables...");
	Environment::setVariable('bar', '%foo%');
	Environment::setVariable('foo', '%foobar%');
	Environment::setVariable('foobar', '%bar%');

	T::dump( Environment::getVariable('bar'), "Getting circular variable:" );

} catch (Exception $e) {
	T::dump( $e );
}



__halt_compiler() ?>

------EXPECT------
Getting variable 'foo': NULL

Exception InvalidStateException: Unknown environment variable 'appDir'.

Defining constant 'APP_DIR':

Getting variable 'appDir': string(6) "/myApp"

Getting variable 'tempDir' #2: string(11) "/myApp/temp"

Setting variable 'test'...

Getting variable 'test': string(11) "/myApp/test"

Getting variables: array(7) {
	"encoding" => string(5) "UTF-8"
	"lang" => string(2) "en"
	"cacheBase" => string(11) "/myApp/temp"
	"tempDir" => string(11) "/myApp/temp"
	"logDir" => string(10) "/myApp/log"
	"appDir" => string(6) "/myApp"
	"test" => string(11) "/myApp/test"
}

Setting circular variables...

Exception InvalidStateException: Circular reference detected for variables: foo, foobar, bar.
