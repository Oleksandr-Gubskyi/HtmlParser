<?php

namespace Console\App\Modules\HtmlTextTranslator;

use Console\App\Modules\HtmlTextTranslator\Business\Parser\HtmlCodeParser;
use Console\App\Modules\HtmlTextTranslator\Business\Parser\HtmlCodeParserInterface;
use Console\App\Modules\HtmlTextTranslator\Business\Reader\HtmlCodeReader;
use Console\App\Modules\HtmlTextTranslator\Business\Reader\HtmlCodeReaderInterface;
use Console\App\Modules\HtmlTextTranslator\Business\Translator\TextTranslator;
use Console\App\Modules\HtmlTextTranslator\Business\Translator\TextTranslatorInterface;
use Console\App\Modules\HtmlTextTranslator\Business\Writer\DataWriter;
use Console\App\Modules\HtmlTextTranslator\Business\Writer\DataWriterInterface;
use DOMDocument;
use Symfony\Component\Console\Helper\HelperInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HtmlTextTranslatorBusinessFactory
{
    /**
     * @var InputInterface
     */
    private InputInterface $input;

    /**
     * @var OutputInterface
     */
    private OutputInterface $output;

    /**
     * @var HelperInterface
     */
    private HelperInterface $helper;

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param HelperInterface $helper
     */
    public function __construct(InputInterface $input, OutputInterface $output, HelperInterface $helper)
    {
        $this->input = $input;
        $this->output = $output;
        $this->helper = $helper;
    }

    /**
     * @param $html
     *
     * @return HtmlCodeReaderInterface
     */
    public function getHtmlCodeReader($html): HtmlCodeReaderInterface
    {
        return new HtmlCodeReader($html);
    }

    /**
     * @param DOMDocument $dom
     *
     * @return HtmlCodeParserInterface
     */
    public function getHtmlCodeParser(DOMDocument $dom): HtmlCodeParserInterface
    {
        return new HtmlCodeParser($dom);
    }

    /**
     * @return TextTranslatorInterface
     */
    public function getTextTranslator(): TextTranslatorInterface
    {
        return new TextTranslator($this->helper, $this->input, $this->output);
    }

    /**
     * @param array $entityArray
     *
     * @return DataWriterInterface
     */
    public function getDataWriter(array $entityArray): DataWriterInterface
    {
        return new DataWriter($entityArray);
    }
}