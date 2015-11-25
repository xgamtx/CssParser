<?php
/**
 * Created by PhpStorm.
 * User: vasilij
 * Date: 09.09.15
 * Time: 21:58
 */

namespace Model;

use Symfony\Component\CssSelector\CssSelector;

/**
 * Class CssElement
 * @package Model
 * @property $styleDescription string
 * @property $filter string
 */
class CssElement {
    /** @var string */
    protected $_styleDescription;
    /** @var string */
    protected $_filter;

    /**
     * @param string $cssElementDescription
     * @return static[]
     * @todo доработать случай некорректного парсинга
     */
    public static function initFromString($cssElementDescription) {
        if (preg_match('/^([a-zA-Z0-9,\.\-#* ]+)\{([^}]*)\}$/m', $cssElementDescription, $matches)) {
            $filterList = explode(',', $matches[1]);
            $cssElementList = [];
            foreach ($filterList as $filter) {
                $element = new static();
                $element->_filter = trim($filter);
                $element->_styleDescription = trim($matches[2]);
                $cssElementList[] = $element;
            }

            return $cssElementList;
        }
        return [];
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function __get($name) {
        $propertyName = '_' . $name;
        if (property_exists($this, $propertyName)) {
            return $this->{$propertyName};
        }

        throw new \InvalidArgumentException('Required parameter not exist: "' . $name . '"');
    }

    /**
     * @return string
     */
    public function getXpath() {
        return CssSelector::toXPath($this->filter, '//');
    }
}