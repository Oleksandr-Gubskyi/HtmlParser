<?php

namespace Console\App\Modules\HtmlTextTranslator\Business\Reader;

use DOMDocument;

interface HtmlCodeReaderInterface
{
    /**
     * @return DOMDocument
     */
    public function load(): DOMDocument;
}