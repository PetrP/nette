<?php

/**
 * Test: Annotations using user classes.
 *
 * @author     David Grudl
 * @category   Nette
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */

use Nette\Reflection\ClassReflection;



require __DIR__ . '/../initialize.php';



class SecuredAnnotation extends Nette\Reflection\Annotation
{
	public $role;
	public $level;
	public $value;
}


/**
 * @secured(disabled)
 */
class TestClass {

	/** @secured(role = "admin", level = 2) */
	public $foo;

}



// Class annotations

$rc = new ClassReflection('TestClass');
T::dump( $rc->getAnnotations() );

T::dump( $rc->getProperty('foo')->getAnnotations() );



__halt_compiler() ?>

------EXPECT------
array(1) {
	"secured" => array(1) {
		0 => object(SecuredAnnotation) (3) {
			"role" => NULL
			"level" => NULL
			"value" => string(8) "disabled"
		}
	}
}

array(1) {
	"secured" => array(1) {
		0 => object(SecuredAnnotation) (3) {
			"role" => string(5) "admin"
			"level" => int(2)
			"value" => NULL
		}
	}
}
