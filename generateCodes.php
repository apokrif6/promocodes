<?php
include_once "autoloader.php";
include_once "error_handler.php";

// CHECK ARE DATA FROM WEBSITE OR CLI
if(isset($_POST["number_of_codes"]) && isset($_POST["length_of_codes"]))
{
    $numberOfCodes = $_POST["number_of_codes"];
    $lengthOfCodes = $_POST["length_of_codes"];

    $manager = new CodesSystemManager();

    try {
        $manager->generateCodes($numberOfCodes, $lengthOfCodes);

        if (file_exists(Config::DEFAULT_CODES_FILE_NAME)) {
            header("Content-disposition: attachment;filename=".basename(Config::DEFAULT_CODES_FILE_NAME));
            readfile(Config::DEFAULT_CODES_FILE_NAME);
            exit;
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    if (validateScriptArguments($argv)) {
        $numberOfCodes = intval($argv[array_search(Config::NUMBER_ARG, $argv)+1]);
        $lengthOfCodes = intval($argv[array_search(Config::LENGTH_ARG, $argv)+1]);
        $fileName = $argv[array_search(Config::FILE_ARG, $argv)+1];

        $manager = new CodesSystemManager();

        $manager->generateCodes($numberOfCodes, $lengthOfCodes, $fileName);

    } else {
        echo "You should use this args:  ".Config::NUMBER_ARG." n ".Config::LENGTH_ARG." n ".Config::FILE_ARG." file_name";
    }
}

function validateScriptArguments(array $argumentsToValidate): bool
{
    $rightNumberOfArguments = count($argumentsToValidate) == 7;
    $rightNumberOfCodesArgument = in_array(Config::NUMBER_ARG, $argumentsToValidate);
    $rightNumberOfCodesParameter = is_int(intval($argumentsToValidate[array_search(Config::NUMBER_ARG, $argumentsToValidate)+1]));
    $rightLengthOfCodesArgument = in_array(Config::LENGTH_ARG, $argumentsToValidate);
    $rightLengthOfCodesParameter = is_int(intval($argumentsToValidate[array_search(Config::LENGTH_ARG, $argumentsToValidate)+1]));
    $rightFileArgument = in_array(Config::FILE_ARG, $argumentsToValidate);
    $rightFileParametr = is_string($argumentsToValidate[array_search(Config::FILE_ARG, $argumentsToValidate)+1]);

    if ($rightNumberOfArguments && $rightNumberOfCodesArgument
        && $rightNumberOfCodesParameter && $rightLengthOfCodesArgument
        && $rightLengthOfCodesParameter && $rightFileArgument && $rightFileParametr) {
        return true;
    }
    return false;
}