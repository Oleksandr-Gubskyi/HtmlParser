<?php

namespace Console\App\Modules\HtmlTextTranslator\Repository;

interface HtmlTextTranslatorEntityManagerInterface
{
    /**
     * @param array $entityArray
     * @return mixed
     */
    public function saveHtmlTextTranslatorEntity(array $entityArray);
}