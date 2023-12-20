<?php

class Validator {

    /**
     * for validating string and its length
     */
    public static function string($value, $min = 1, $max = INF){
        $value = trim($value);

        return $value >= $min && $value <= $max;
    }

    /**
     * for validating email
     */
    public static function email($value = ''){
        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}