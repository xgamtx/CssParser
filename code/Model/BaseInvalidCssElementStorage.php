<?php
/**
 * Created by PhpStorm.
 * User: vasilij
 * Date: 09.09.15
 * Time: 22:10
 */

namespace Model;

abstract class BaseInvalidCssElementStorage {
    /** @var string[] */
    protected $cssElementList = [];
    /**
     * @param string $invalidCssElement
     * @throws \InvalidArgumentException
     */
    public function addElement($invalidCssElement) {
        if (is_string($invalidCssElement)) {
            throw new \InvalidArgumentException("Invalid css element must be a string, " . gettype($invalidCssElement) . " given");
        }
        $this->cssElementList[] = $invalidCssElement;
    }

    /**
     * @return string[]
     */
    public function getElementList() {
        return $this->cssElementList;
    }

    abstract public function save();

    abstract public function load();
}