<?php
/**
 * Created by PhpStorm.
 * User: vasilij
 * Date: 11.09.15
 * Time: 0:20
 */

$str = '* {    -webkit-box-sizing: border-box;    -moz-box-sizing: border-box;    box-sizing: border-box;}';
$reg = '/^([a-zA-Z0-9,\.\-:#* ]+)\{([^}]*)\}$/';
preg_match($reg, $str, $matches);
var_dump($matches);