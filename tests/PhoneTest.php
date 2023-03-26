<?php

namespace Bmatovu\Beyonic\Tests;

use Bmatovu\Beyonic\Support\Phone;

/**
 * @see \Bmatovu\Beyonic\Support\Phone
 */
class PhoneTest extends TestCase
{
    public function test_can_format_phone_no()
    {
        $this->assertEquals('+256788747744', Phone::toIntlFormat('0788747744'));
        $this->assertEquals('+256788747744', Phone::toIntlFormat('+256788747744'));
        $this->assertEquals('+256788747744', Phone::toIntlFormat('256788747744'));
        $this->assertEquals('+256788747744', Phone::toIntlFormat('+256 (788) 747-744'));

        $this->assertEquals('+2560788747744', Phone::toIntlFormat('+256 (0) 788-747744'));
        $this->assertEquals('+788747744', Phone::toIntlFormat('788747744'));
    }
}
