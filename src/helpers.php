<?php

/**
 * Helper functions
 */

if (! function_exists('format_number_in_french')) {
    /**
     * Change plain number to french formatted currency
     *
     * @param $number
     * @param $currency
     */
    function format_number_in_french($number)
    {
        return number_format($number, 2, ',', ' ');
    }
}