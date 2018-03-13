<?php

namespace Plotting\Figures;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass Plotting\Figures\SmallSizeStars
 */
final class SmallSizeStarsTest extends TestCase {
    /**
     * @testdox If argument is in invalid range, method generate() should throw an exception.
     *
     * @dataProvider invalidSizeDataProvider
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Desired number of lines should be an odd number and it must be bigger than 3.
     */
    public static function testInvalidSizeArgument(int $size) {
        $smallSizeStars = new SmallSizeStars();

        $smallSizeStars->generate($size);
    }

    public static function invalidSizeDataProvider() {
        return [
            [-1],
            [3],
            [2]
        ];
    }

    /**
     * @dataProvider smallMediumSizeDataProvider
     *
     * @testdox If a figure was generated successfully, it should be a type of string and include following:
     * [
     *  ... ' ',
     *      '+',
     *      'X'
     * ]
     */
    public static function testGenerateValidResult(int $size) {
        $smallSizeStars = new SmallSizeStars();

        $result = $smallSizeStars->generate($size);
        self::assertInternalType('string', $result);

        $valuesInArray = [" ", "+", "X"];
        self::assertGreaterThan(0, \count($valuesInArray));
        foreach ($valuesInArray as $value) {
            self::assertTrue(\in_array($value, \str_split($result)));
        }
    }

    public function smallMediumSizeDataProvider() : array {
        return [
          [5],
          [7]
        ];
    }
}
