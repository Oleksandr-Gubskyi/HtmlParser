<?php

namespace Console\App\Modules\HtmlTextTranslator;

use Console\App\Modules\HtmlTextTranslator\Business\Writer\DataWriter;
use Symfony\Component\Console\Helper\HelperInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HtmlTextTranslatorFacade
{
    /**
     * @var HtmlTextTranslatorBusinessFactory
     */
    private HtmlTextTranslatorBusinessFactory $factory;

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param HelperInterface $helper
     */
    public function __construct(InputInterface $input, OutputInterface $output, HelperInterface $helper)
    {
        $this->factory = new HtmlTextTranslatorBusinessFactory($input, $output, $helper);
    }

    /**
     * @param string $html
     *
     * @return array
     */
    public function parseHtml(string $html): array
    {
        return $this->factory->getHtmlCodeParser(
            $this->factory->getHtmlCodeReader($html)->load()
        )->parse();
    }

    /**
     * @return string
     */
    public function chooseLang(): string
    {
        return $this->factory->getTextTranslator()->chooseLang();
    }

    /**
     * @param array $wordsBeforeTranslation
     *
     * @return array
     */
    public function translateTexts(array $wordsBeforeTranslation): array
    {
        return $this->factory->getTextTranslator()->translate($wordsBeforeTranslation);
    }

    /**
     * @param array $entityArray
     *
     * @return bool
     */
    public function saveData(array $entityArray): bool {
        return $this->factory->getDataWriter($entityArray)->save();
    }
}