<?php

/**
 * Test: Nette\Web\Uri::isEqual()
 *
 * @author     David Grudl
 * @category   Nette
 * @package    Nette\Web
 * @subpackage UnitTests
 */

use Nette\Web\Uri;



require __DIR__ . '/../initialize.php';



$uri = new Uri('http://exampl%65.COM?text=foo%20bar+foo');
$uri->canonicalize();
T::dump( $uri->isEqual('http://example.com/?text=foo+bar%20foo') );



__halt_compiler() ?>

------EXPECT------
bool(TRUE)
