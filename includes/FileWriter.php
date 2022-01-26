<?php

class FileWriter
{
    public function writeToFile(string $text, string $filename = Config::DEFAULT_CODES_FILE_NAME): void
    {
        file_put_contents($filename, $text);
    }
}