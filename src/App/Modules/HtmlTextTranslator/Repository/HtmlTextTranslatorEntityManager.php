<?php

namespace Console\App\Modules\HtmlTextTranslator\Repository;

use Console\App\Modules\HtmlTextTranslator\Entities\HtmlTextTranslatorEntity;

class HtmlTextTranslatorEntityManager implements HtmlTextTranslatorEntityManagerInterface
{
    /**
     * @param array $entityArray
     * @return void
     */
    public function saveHtmlTextTranslatorEntity(array $entityArray)
    {
        $htmlTextTranslatorEntity = new HtmlTextTranslatorEntity();
        $htmlTextTranslatorEntity->setFromArray($entityArray);
        $htmlTextTranslatorEntity->save();
    }
}