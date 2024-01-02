<?php

namespace Console\App\Modules\HtmlTextTranslator\Business\Translator;

use Symfony\Component\Console\Helper\HelperInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class TextTranslator implements TextTranslatorInterface
{
    /**
     * @var HelperInterface
     */
    protected HelperInterface $helper;

    /**
     * @var InputInterface
     */
    protected InputInterface $input;

    /**
     * @var OutputInterface
     */
    protected OutputInterface $output;

    /**
     * @param HelperInterface $helper
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function __construct(HelperInterface $helper, InputInterface $input, OutputInterface $output)
    {
        $this->helper = $helper;
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * @param array $wordsBeforeTranslation
     * @return array
     */
    public function translate(array $wordsBeforeTranslation): array
    {
        $wordsAfterTranslation = [];
        foreach ($wordsBeforeTranslation as $word) {
            $question = new Question(sprintf('Please pass translation for %s: ', $word));
            $wordsAfterTranslation[] = $this->helper->ask($this->input, $this->output, $question);
        }

        return $wordsAfterTranslation;
    }

    /**
     * @return string
     */
    public function chooseLang(): string
    {
        $question = new Question('Please choose lang(uk/en): ');
        $translationLang = '';
        while($translationLang !== 'uk' && $translationLang !== 'en') {
            $translationLang = $this->helper->ask($this->input, $this->output, $question);
        }

        return $translationLang;
    }
}