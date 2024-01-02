<?php

namespace Console\App\Modules\HtmlTextTranslator\Business\Reader;

use DOMDocument;

class HtmlCodeReader implements HtmlCodeReaderInterface
{
    /**
     * @var string
     */
    protected string $html;

    /**
     * @param string $html
     */
    public function __construct(string $html)
    {
        $this->html = $html;
    }

    /**
     * @return DOMDocument
     */
    public function load(): DOMDocument
    {
        $dom = new DOMDocument();
        $dom->loadHTML($this->html);

        return $dom;
    }
}