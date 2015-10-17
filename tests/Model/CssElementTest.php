<?php
/**
 * Created by PhpStorm.
 * User: vasilij
 * Date: 09.09.15
 * Time: 22:22
 */

use Model\CssElement;

class CssElementTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function EmptyResultSentEmptyArrayReceived() {
        $this->assertEquals([], CssElement::initFromString(''));
    }

    /** @test */
    public function SingleFilterAvailableSingleValueReceived() {
        $cssStyle = '.page-wrap { font-family: Arial, Helvetica, sans-serif; font-size: 12px;}';
        $cssElementList = CssElement::initFromString($cssStyle);
        $this->assertEquals(1, count($cssElementList));
        $cssElement = $cssElementList[0];
        $this->assertEquals('Model\CssElement', get_class($cssElement));
        $this->assertEquals('.page-wrap', $cssElement->filter);
        $this->assertEquals('font-family: Arial, Helvetica, sans-serif; font-size: 12px;', $cssElement->styleDescription);
    }

    /** @test */
    public function TwoFilterAvailableTwoValueReceived() {
        $cssStyle = '.page-wrap, #test { font-family: Arial, Helvetica, sans-serif; font-size: 12px;}';
        $cssElementList = CssElement::initFromString($cssStyle);
        $this->assertEquals(2, count($cssElementList));
        $cssElement = $cssElementList[0];
        $this->assertEquals('Model\CssElement', get_class($cssElement));
        $this->assertEquals('.page-wrap', $cssElement->filter);
        $this->assertEquals('font-family: Arial, Helvetica, sans-serif; font-size: 12px;', $cssElement->styleDescription);
    }
}
