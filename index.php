<?php
/**
 * Created by PhpStorm.
 * User: vasilij
 * Date: 29.08.15
 * Time: 15:10
 */

require 'FatalErrorHandler.php';
require_once 'AutoLoad.php';

$htmlContent = file_get_contents('test.html');
$html = new \Model\Html($htmlContent);
$cssCollection = new \Model\CssCollection();
$cssCollection->appendFromFile('main.css');
$cssCollection->dump();
$zz = $html->isUsedStyle("*[@class]");
$z2 = $zz->item(0);
$z1 = 1;
//$html->isUsedStyle("*[@class and contains(concat(' ', normalize-space(@class), ' '), ' page ')]");
//foreach ($cssCollection as $ind => $cssStyle) {
//    echo $ind . ($html->isUsedStyle($cssStyle->getXpath()) ? " 1<br>" : ' 0<br>');
//}

//echo phpinfo();
