<?php

namespace App\Helpers;

class ReferenceGeneratorHelper
{
    /**
     * Generates an array of reference strings.
     *
     * @return string A string of 11 characters.
     */
    public static function generateReferenceString()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_length = strlen($characters);

        $reference_string = '';
        for ($j = 0; $j < 11; $j++) {
            $random_index = rand(0, $characters_length - 1);
            $reference_string .= $characters[$random_index];
        }
        return $reference_string;
    }
}
