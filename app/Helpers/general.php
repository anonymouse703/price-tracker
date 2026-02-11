<?php

if ( ! function_exists('generateCode')) {

    /**
     * Generate Code
     */
    function generateCode(int $length = 15): string
    {
        $cleanNumber = preg_replace( '/[^0-9]/', '', microtime(false) );
        $preg_code = strtoupper(base_convert($cleanNumber, 10, 36));

        $time_code = strtoupper(base_convert(time(), 10, 36));

        return substr($preg_code . $time_code, 0, $length);
    }
}

if ( ! function_exists('getDays')) {

    /**
     * Get days from dates
     */
    function getDays(string $start, string $end): int
    {
        $period = \Carbon\CarbonPeriod::create($start, $end);

        return count($period);
    }
}

if ( ! function_exists('bround')) {

    /**
     * Round-off
     */
    function bround($value, $decimalPlaces = 2): float|int
    {
        // banker's style rounding or round-half-even
        // (round down when even number is left of 5, otherwise round up)
        // $value is value to round
        // $decimalPlaces specifies number of decimal places to retain
        static $dFuzz=0.00001; // to deal with floating-point precision loss
        $iRoundup=0; // amount to round up by

        $iSign=($value!=0.0) ? intval($value/abs($value)) : 1;
        $value=abs($value);

        // get decimal digit in question and amount to right of it as a fraction
        $dWorking=$value*pow(10.0,$decimalPlaces+1)-floor($value*pow(10.0,$decimalPlaces))*10.0;
        $iEvenOddDigit=floor($value*pow(10.0,$decimalPlaces))-floor($value*pow(10.0,$decimalPlaces-1))*10.0;

        if (abs($dWorking-5.0)<$dFuzz) $iRoundup=($iEvenOddDigit & 1) ? 1 : 0;
        else $iRoundup=($dWorking>5.0) ? 1 : 0;

        return $iSign*((floor($value*pow(10.0,$decimalPlaces))+$iRoundup)/pow(10.0,$decimalPlaces));
    }
}
