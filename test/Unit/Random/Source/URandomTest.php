<?php

use CryptLib\Random\Source\URandom;

use CryptLib\Core\Strength;



class Unit_Random_Source_URandomTest extends PHPUnit_Framework_TestCase {

    public static function provideGenerate() {
        $data = array();
        for ($i = 0; $i < 10; $i += 5) {
            $not = $i > 0 ? str_repeat(chr(0), $i) : chr(0);
            $data[] = array($i, $not);
        }
        return $data;
    }

    /**
     * @covers CryptLib\Random\Source\URandom::getStrength
     */
    public function testGetStrength() {
        $strength = new Strength(Strength::MEDIUM);
        $actual = URandom::getStrength();
        $this->assertEquals($actual, $strength);
    }

    /**
     * @covers CryptLib\Random\Source\URandom::generate
     * @dataProvider provideGenerate
     * @group slow
     */
    public function testGenerate($length, $not) {
        $rand = new URandom;
        $stub = $rand->generate($length);
        $this->assertEquals($length, strlen($stub));
        if (file_exists('/dev/urandom')) {
            $this->assertNotEquals($not, $stub);
        } else {
            $this->assertEquals(str_repeat(chr(0), $length), $stub);
        }
    }

}
