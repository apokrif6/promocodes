<?php

class CodesSystemManager
{
    private CodesGenerator $codesGenerator;
    private FileWriter $fileWrite;

    public function __construct()
    {
        $this->codesGenerator = new CodesGenerator();
        $this->fileWrite = new FileWriter();
    }

    public function generateCodes(int $numberOfCodes, int $lengthOfCodes, string $fileName = Config::DEFAULT_CODES_FILE_NAME): void
    {
        $listOfCodes = $this->codesGenerator->generateArrayWithCodes($numberOfCodes, $lengthOfCodes);

        $textToWrite = implode("\n", $listOfCodes);

        $this->fileWrite->writeToFile($textToWrite, $fileName);
    }
}