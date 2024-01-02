<?php

namespace Console\App\Modules\HtmlTextTranslator\Business\Writer;

interface DataWriterInterface
{
    /**
     * @return void
     */
    public function save(): bool;
}