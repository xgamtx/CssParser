<?php
/**
 * Created by PhpStorm.
 * User: vasilij
 * Date: 29.08.15
 * Time: 15:22
 */

namespace Model;

class CssCollection implements \Iterator {

    /** @var CssElement[] */
    protected $styles = [];
    protected $position = 0;

    public function __construct($cssStyles = '') {
        if (!$cssStyles) {
            $this->appendData($cssStyles);
        }
    }

    /**
     * @param string $fileName
     */
    public function appendFromFile($fileName) {
        $cssStyle = file_get_contents($fileName);
        $this->appendData($cssStyle);
    }

    public function appendData($cssStyle) {
        $cssStyle = str_replace(["\r", "\n", "\t"], '', $cssStyle);
        if (preg_match_all('/([^{}]+\{[^{}]+\})/', $cssStyle, $matches)) {
            array_shift($matches);
            foreach ($matches[0] as $cssStyleString) {
                $encodedCssStyle = CssElement::initFromString($cssStyleString);
                $this->styles = array_merge($this->styles, $encodedCssStyle);
            }

        }
    }

    public function clear() {
        $this->styles = [];
    }

    function rewind() {
        $this->position = 0;
    }

    function current() {
        return $this->styles[$this->position];
    }

    function key() {
        return $this->position;
    }

    function next() {
        ++$this->position;
    }

    function valid() {
        return isset($this->styles[$this->position]);
    }

    public function dump() {
        var_dump($this->styles);
    }

}