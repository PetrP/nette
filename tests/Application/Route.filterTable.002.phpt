<?php

/**
 * Test: Nette\Application\Route with FilterTable
 *
 * @author     David Grudl
 * @category   Nette
 * @package    Nette\Application
 * @subpackage UnitTests
 */

use Nette\Application\Route;



require __DIR__ . '/../initialize.php';

require __DIR__ . '/Route.inc';



Route::addStyle('#xlat', 'presenter');
Route::setStyleProperty('#xlat', Route::FILTER_TABLE, array(
	'produkt' => 'Product',
	'kategorie' => 'Category',
	'zakaznik' => 'Customer',
	'kosik' => 'Basket',
));

$route = new Route(' ? action=<presenter #xlat>', array());

testRouteIn($route, '/?action=kategorie');



__halt_compiler() ?>

------EXPECT------
==> /?action=kategorie

string(8) "Category"

array(1) {
	"test" => string(9) "testvalue"
}

string(33) "/?test=testvalue&action=kategorie"
