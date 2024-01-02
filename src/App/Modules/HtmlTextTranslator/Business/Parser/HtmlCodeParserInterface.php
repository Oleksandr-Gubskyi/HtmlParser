<?php

namespace Console\App\Modules\HtmlTextTranslator\Business\Parser;

interface HtmlCodeParserInterface
{
    /**
     * @return array
     */
    public function parse(): array;
}