<?php

/**
 * Test: Nette\Debug notices with $strictMode.
 *
 * @author     David Grudl
 * @category   Nette
 * @package    Nette
 * @subpackage UnitTests
 */

use Nette\Debug;



require __DIR__ . '/../initialize.php';



Debug::$consoleMode = FALSE;
Debug::$productionMode = FALSE;

Debug::$strictMode = TRUE;
Debug::enable();



function first($arg1, $arg2)
{
	second(TRUE, FALSE);
}


function second($arg1, $arg2)
{
	third(array(1, 2, 3));
}


function third($arg1)
{
	$x++;
}


first(10, 'any string');

T::note('after');



__halt_compiler() ?>

---EXPECTHEADERS---
Status: 500 Internal Server Error
