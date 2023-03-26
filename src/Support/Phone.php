<?php

namespace Bmatovu\Beyonic\Support;

class Phone
{
    /**
     * Format msisdn to international format.
     *
     * @param string      $msisdn
     * @param string|null $countryCode
     * @param string|null $prefix
     *
     * @return string
     */
    public static function toIntlFormat($msisdn, $countryCode = '256', $prefix = '+')
    {
        $msisdn = preg_replace("/[^{$prefix}0-9]/", '', $msisdn);

        if ($prefix && strpos($msisdn, $prefix) === 0) {
            return $msisdn;
        }

        if ($countryCode && strpos($msisdn, '0') === 0) {
            $msisdn = preg_replace('/^0/', $countryCode, $msisdn, 1);
        }

        return "{$prefix}{$msisdn}";
    }
}
