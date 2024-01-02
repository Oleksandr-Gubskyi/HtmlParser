<?php

namespace Console\App\Modules\HtmlTextTranslator\Entities;

class HtmlTextTranslatorEntity
{
    private $html;
    private $langBeforeTranslate;
    private $langAfterTranslate;
    private $textsBeforeTranslate;
    private $textsAfterTranslate;

    public function setFromArray(array $entityArray)
    {
        $this->html = $entityArray['html'];
        $this->langBeforeTranslate = $entityArray['langBeforeTranslate'];
        $this->langAfterTranslate = $entityArray['langAfterTranslate'];
        $this->textsBeforeTranslate = $entityArray['textsBeforeTranslate'];
        $this->textsAfterTranslate = $entityArray['textsAfterTranslate'];
    }

    public function save()
    {

    }
}