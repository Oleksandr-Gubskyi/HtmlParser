<?php

namespace Console\App\Commands;

use Console\App\Modules\HtmlTextTranslator\HtmlTextTranslatorFacade;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class HtmlParserCommand extends Command
{
    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName('html-parse')
            ->setDescription('Parse HTML code')
            ->addArgument('html', InputArgument::REQUIRED, 'Pass the html code.')
            ->addArgument('iso', InputArgument::REQUIRED, 'Pass the lang iso code.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $html = $input->getArgument('html');
        $helper = $this->getHelper('question');
        $facade = new HtmlTextTranslatorFacade($input, $output, $helper);

        $wordsBeforeTranslation = $facade->parseHtml($input->getArgument('html'));
        $translationLang = $facade->chooseLang();
        $wordsAfterTranslation = $facade->translateTexts($wordsBeforeTranslation);

        $facade->saveData([
            'html' => $html,
            'langBeforeTranslate' => $input->getArgument('iso'),
            'langAfterTranslate' => $translationLang,
            'wordsBeforeTranslation' => $wordsBeforeTranslation,
            'wordsAfterTranslation' => $wordsAfterTranslation
        ]);

        return Command::SUCCESS;
    }
}
