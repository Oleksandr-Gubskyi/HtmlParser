<?php

namespace Console\App\Modules\HtmlTextTranslator\Business\Parser;

use DOMDocument;
use DOMXPath;

class HtmlCodeParser implements HtmlCodeParserInterface
{
    /**
     * @var DOMDocument
     */
    protected DOMDocument $dom;

    /**
     * @var string
     */
    protected string $xPath;

    /**
     * @param DOMDocument $dom
     * @param string $xPath
     */
    public function __construct(DOMDocument $dom, string $xPath = '//body/*')
    {
        $this->dom = $dom;
        $this->xPath = $xPath;
    }

    /**
     * @return array
     */
    public function parse(): array
    {
        $xpath = new DOMXPath($this->dom);
        $tags = $xpath->query($this->xPath);
        $wordsBeforeTranslation = [];

        foreach ($tags as $tag) {
            $wordsBeforeTranslation[] = trim($tag->nodeValue);
        }

        return array_diff($wordsBeforeTranslation, ['']);
    }
}