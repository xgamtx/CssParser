<?php
/**
 * Created by PhpStorm.
 * User: vasilij
 * Date: 29.08.15
 * Time: 15:10
 */

define('APP_ROOT', dirname(__FILE__));

require 'FatalErrorHandler.php';
require_once 'AutoLoad.php';

$htmlContent = file_get_contents('test.html');
$html = new \Model\Html($htmlContent);
$fileList = $html->getStyleFileNameList();
$cssCollection = new \Model\CssCollection();
$cssCollection->appendFromFile('main.css');

foreach ($cssCollection as $ind => $cssStyle) {
    echo $ind . $cssStyle->getXpath() . ' --' . ($html->isUsedStyle($cssStyle->getXpath()) ? " 1\r\n" : " 0\r\n");
}
