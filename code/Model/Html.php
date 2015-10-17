<?php
/**
 * Created by PhpStorm.
 * User: vasilij
 * Date: 29.08.15
 * Time: 15:22
 */

namespace Model;

use DOMXPath;

class Html {
    /** @var DOMXPath */
    protected $htmlPage;
    /** @var string */
    protected $encoding = 'cp1251';

    public function __construct($htmlCode) {
        // create new DOMDocument
        $document = new \DOMDocument('1.0', $this->getEncoding());

        // set error level
        $internalErrors = libxml_use_internal_errors(true);

        // load HTML
        $document->loadHTML($htmlCode);
        $z = $document->saveXML();

        // Restore error level
        libxml_use_internal_errors($internalErrors);

        // create new XPath
        $this->htmlPage = new \DOMXPath($document);
    }

    protected function getEncoding() {
        return $this->encoding;
    }

    public function isUsedStyle($xpath) {
        $z1 = $this->htmlPage->document->saveXML();
        $zz = $this->htmlPage->query($xpath);
        $z1 = 1;
        return $this->htmlPage->query($xpath);//->length !== 0;
    }
}
