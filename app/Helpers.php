<?php


namespace App;


class Helpers
{
    public static function convertYesNoToBool($value)
    {
        $options = ['yes', 'y', 'x'];
        return in_array(strtolower($value), $options);
    }

    public static function setNullIfEmpty($value)
    {
        return ($value == '') ? null : $value;
    }
}