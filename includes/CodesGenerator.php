<?php

class CodesGenerator
{
    private function generateCode(int $length): string
    {
        // characters map
        $numbers      = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $lowerCase    = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];
        $upperCase    = ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M'];

        $allCharactersToUse = array_merge($upperCase, $lowerCase, $numbers);

        $generatedCode = "";

        for ($i = 0; $i < $length; $i++) {
            $generatedCode .= $allCharactersToUse[mt_rand(0, count($allCharactersToUse)-1)];
        }

        return $generatedCode;
    }

    public function generateArrayWithCodes(int $numberOfCodes, int $lengthOfCodes): array
    {
        $codes = [];

        for ($i = 0; $i < $numberOfCodes; $i++) {
            $codes[] .= $this->generateCode($lengthOfCodes);
        }

        return $this->clearDuplicateCodes($codes, $numberOfCodes, $lengthOfCodes);
    }

    private function clearDuplicateCodes(array $arrayWithCodes, int $requiredNumberOfCodes, int $lengthOfCodes): array
    {
        $arrayAfterRemoveDuplicates = array_unique($arrayWithCodes);

        $numberOfGeneratedCodes = count($arrayAfterRemoveDuplicates);

        if ($numberOfGeneratedCodes !== $requiredNumberOfCodes) {
            for ($i = $numberOfGeneratedCodes; $i < $requiredNumberOfCodes; $i++) {
                $arrayAfterRemoveDuplicates[] .= $this->generateCode($lengthOfCodes);
            }
        }

        return $arrayAfterRemoveDuplicates;
    }
}