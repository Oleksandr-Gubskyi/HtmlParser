<?php

namespace Console\App\Modules\HtmlTextTranslator\Business\Translator;

interface TextTranslatorInterface
{
    /**
     * @param array $wordsBeforeTranslation
     * @return array
     */
    public function translate(array $wordsBeforeTranslation): array;

    /**
     * @return string
     */
    public function chooseLang(): string;
}