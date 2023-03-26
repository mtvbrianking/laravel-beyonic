<?php

namespace Bmatovu\Beyonic\Support;

class Phone
{
    /**
     * Format msisdn to international format.
     *
     * @param string $msisdn
     * @param null|string $countryCode
     * @param null|string $prefix
     *
     * @return string
     */
    public static function toIntlFormat($msisdn, $countryCode = '256', $prefix = '+')
    {
        $msisdn = preg_replace("/[^{$prefix}0-9]/", '', $msisdn);

        if ($prefix && 0 === strpos($msisdn, $prefix)) {
            return $msisdn;
        }

        if ($countryCode && 0 === strpos($msisdn, '0')) {
            $msisdn = preg_replace('/^0/', $countryCode, $msisdn, 1);
        }

        return "{$prefix}{$msisdn}";
    }
}
