<?php

namespace Src;

class StringRevers
{
    private function wordRevers(string $inputString): string {
        $origString = mb_str_split($inputString);
        $lowerCaseString = mb_str_split(mb_strtolower($inputString));
        $upperRegisterList = array_keys(array_diff($origString, $lowerCaseString));

        $lowerCaseString = array_reverse($lowerCaseString);

        foreach ($upperRegisterList as $item) {
            $lowerCaseString[$item] = mb_strtoupper($lowerCaseString[$item]);
        }

        return array_reduce($lowerCaseString, function ($carry, $item) {
            return $carry .= $item;
        });
    }

    public function handler(string $inputLine): string
    {
        $regexpLetter = "[^\s,.:;!?\-\"'`«»]";
        $outputLine = "";

        $tempCharArray = mb_str_split($inputLine);
        $charCount = count($tempCharArray);
        $buffer = "";

        foreach ($tempCharArray as $index => $item) {
            if (mb_ereg($regexpLetter, $item)) {
                $buffer .= $item;
            }
            if (!mb_ereg($regexpLetter, $item) || $index === ($charCount - 1)) {
                if (mb_strlen($buffer) > 0) {
                    $outputLine .= $this->wordRevers($buffer);
                    $buffer = "";
                }
            }
            if (!mb_ereg($regexpLetter, $item)) {
                $outputLine .= $item;
            }
        }

        return $outputLine;
    }
}