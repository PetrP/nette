<?php

/**
 * Test: FunctionReflection tests.
 *
 * @author     David Grudl
 * @category   Nette
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */

use Nette\Reflection\FunctionReflection;



require __DIR__ . '/../initialize.php';



function bar() {}

$function = new FunctionReflection('bar');
T::dump( $function->getExtension() );

$function = new FunctionReflection('sort');
T::dump( $function->getExtension() );



__halt_compiler() ?>

------EXPECT------
NULL

object(%ns%ExtensionReflection) (1) {
	"name" => string(8) "standard"
}
