<?php

namespace Plotting\Figures;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass Plotting\Figures\LargeSizeStars
 */
final class LargeSizeStarsTest extends TestCase {
    /**
     * @testdox If argument is in invalid range, method generate() should throw an exception.
     *
     * @dataProvider invalidSizeDataProvider
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Desired number of lines should be odd and bigger than 11.
     */
    public static function testInvalidSizeArgument(int $size) {
        $largeSizeStars = new LargeSizeStars();

        $largeSizeStars->generate($size);
    }

    public static function invalidSizeDataProvider() : array {
        return [
          [0],
          [-1],
          [3],
          [1],
          [2]
        ];
    }

    /**
     * @testdox If a figure was generated successfully, it should be a type of string and include following:
     * [
     *  ... ' ',
     *      '+',
     *      'X'
     * ]
     */
    public static function testGenerateValidResult() {
        $largeSizeStars = new LargeSizeStars();

        $result = $largeSizeStars->generate(11);
        self::assertInternalType('string', $result);

        $valuesInArray = [" ", "+", "X"];
        self::assertGreaterThan(0, \count($valuesInArray));
        foreach ($valuesInArray as $value) {
            self::assertTrue(\in_array($value, \str_split($result)));
        }
    }
}
