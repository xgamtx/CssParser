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
    protected $encoding = 'UTF-8';

    public function __construct($htmlCode) {
        // create new DOMDocument
        $document = new \DOMDocument('1.0', $this->getEncoding());

        // set error level
        $internalErrors = libxml_use_internal_errors(true);

        // load HTML
        $document->loadHTML($htmlCode);

        // Restore error level
        libxml_use_internal_errors($internalErrors);

        // create new XPath
        $this->htmlPage = new \DOMXPath($document);
    }

    /**
     * @return string
     */
    protected function getEncoding() {
        return $this->encoding;
    }

    /**
     * @param string $xpath
     * @return bool
     */
    public function isUsedStyle($xpath) {
        return $this->htmlPage->query($xpath)->length !== 0;
    }

    /**
     * @return string[]
     */
    public function getStyleFileNameList() {
        $xpath = '//link[@type and contains(concat(\' \', normalize-space(@type), \' \'), \' text/css \')]';
        $fileList = $this->htmlPage->query($xpath);
        $fileNameList = [];
        /** @var \DOMElement $file */
        foreach ($fileList as $file) {
            $fileNameList[] = $file->getAttribute('href');
        }
        return $fileNameList;
    }
}
