<?php

namespace Bmatovu\Beyonic\Tests;

use Bmatovu\Beyonic\Support\Phone;

/**
 * @see \Bmatovu\Beyonic\Support\Phone
 */
class PhoneTest extends TestCase
{
    public function testCanFormatPhoneNo()
    {
        static::assertSame('+256772123456', Phone::toIntlFormat('0772123456'));
        static::assertSame('+256772123456', Phone::toIntlFormat('+256772123456'));
        static::assertSame('+256772123456', Phone::toIntlFormat('256772123456'));
        static::assertSame('+256772123456', Phone::toIntlFormat('+256 (772) 123-456'));

        static::assertSame('+2560772123456', Phone::toIntlFormat('+256 (0) 772-123456'));
        static::assertSame('+772123456', Phone::toIntlFormat('772123456'));
    }
}
