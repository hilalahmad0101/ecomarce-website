<?php

if (!function_exists('formatCurrency')) {
    /**
     * Format a currency value with a dollar sign.
     *
     * @param float $amount
     * @return string
     */
    function formatCurrency($amount)
    {
        return '$' . number_format($amount, 2);
    }
}
