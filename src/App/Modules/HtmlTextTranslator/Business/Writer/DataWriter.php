<?php

namespace Console\App\Modules\HtmlTextTranslator\Business\Writer;

class DataWriter implements DataWriterInterface
{
    /**
     * @var array
     */
    protected array $entityArray;

    /**
     * @param array $entityArray
     */
    public function __construct(array $entityArray)
    {
        $this->entityArray = $entityArray;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        var_dump($this->entityArray);

        return true;
    }
}