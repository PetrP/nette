<?php

/**
 * Test: Annotations file parser.
 *
 * @author     David Grudl
 * @category   Nette
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */

use Nette\Reflection\AnnotationsParser,
	Nette\Environment;



require __DIR__ . '/../initialize.php';

require __DIR__ . '/files/annotations.php';



// temporary directory
define('TEMP_DIR', __DIR__ . '/tmp');
T::purge(TEMP_DIR);
Environment::setVariable('tempDir', TEMP_DIR);


AnnotationsParser::$useReflection = FALSE;


T::note('AnnotatedClass1');

$rc = new ReflectionClass('Nette\AnnotatedClass1');
T::dump( AnnotationsParser::getAll($rc) );
T::dump( AnnotationsParser::getAll($rc->getProperty('a')), '$a' );
T::dump( AnnotationsParser::getAll($rc->getProperty('b')), '$b' );
T::dump( AnnotationsParser::getAll($rc->getProperty('c')), '$c' );
T::dump( AnnotationsParser::getAll($rc->getProperty('d')), '$d' );
T::dump( AnnotationsParser::getAll($rc->getProperty('e')), '$e' );
T::dump( AnnotationsParser::getAll($rc->getProperty('f')), '$f' );
//T::dump( AnnotationsParser::getAll($rc->getProperty('g')), '$g' ); // ignore due PHP bug #50174
T::dump( AnnotationsParser::getAll($rc->getMethod('a')), 'a()' );
T::dump( AnnotationsParser::getAll($rc->getMethod('b')), 'b()' );
T::dump( AnnotationsParser::getAll($rc->getMethod('c')), 'c()' );
T::dump( AnnotationsParser::getAll($rc->getMethod('d')), 'd()' );
T::dump( AnnotationsParser::getAll($rc->getMethod('e')), 'e()' );
T::dump( AnnotationsParser::getAll($rc->getMethod('f')), 'f()' );
T::dump( AnnotationsParser::getAll($rc->getMethod('g')), 'g()' );

T::note('AnnotatedClass2');

$rc = new ReflectionClass('Nette\AnnotatedClass2');
T::dump( AnnotationsParser::getAll($rc) );

T::note('AnnotatedClass3');

$rc = new ReflectionClass('Nette\AnnotatedClass3');
T::dump( AnnotationsParser::getAll($rc) );



__halt_compiler() ?>

------EXPECT------
AnnotatedClass1

array(1) {
	"author" => array(1) {
		0 => string(4) "john"
	}
}

$a: array(1) {
	"var" => array(1) {
		0 => string(1) "a"
	}
}

$b: array(1) {
	"var" => array(1) {
		0 => string(1) "b"
	}
}

$c: array(1) {
	"var" => array(1) {
		0 => string(1) "c"
	}
}

$d: array(1) {
	"var" => array(1) {
		0 => string(1) "d"
	}
}

$e: array(1) {
	"var" => array(1) {
		0 => string(1) "e"
	}
}

$f: array(0)

a(): array(1) {
	"return" => array(1) {
		0 => string(1) "a"
	}
}

b(): array(1) {
	"return" => array(1) {
		0 => string(1) "b"
	}
}

c(): array(1) {
	"return" => array(1) {
		0 => string(1) "c"
	}
}

d(): array(1) {
	"return" => array(1) {
		0 => string(1) "d"
	}
}

e(): array(1) {
	"return" => array(1) {
		0 => string(1) "e"
	}
}

f(): array(0)

g(): array(1) {
	"return" => array(1) {
		0 => string(1) "g"
	}
}

AnnotatedClass2

array(1) {
	"author" => array(1) {
		0 => string(4) "jack"
	}
}

AnnotatedClass3

array(0)
