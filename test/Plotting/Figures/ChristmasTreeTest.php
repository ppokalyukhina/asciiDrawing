<?php

namespace Plotting\Figures;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass Plotting\Figures\ChristmasTree
 */
final class ChristmasTreeTest extends TestCase {
    /**
     * @dataProvider invalidSizesDataProvider
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Given number of lines must be minimum 3.
     */
    public function testInvalidSize(int $size) {
        $tree = new ChristmasTree();

        $tree->generate($size);
    }

    public function invalidSizesDataProvider() {
        return [
          [0],
          [-10],
          [2]
        ];
    }

    /**
     * @dataProvider validSizesDataProvider
     */
    public function testValidChristmasTree(int $size) {
        $tree = new ChristmasTree();

        $result = $tree->generate($size);
        self::assertInternalType('string', $result);

        $valuesInArray = [" ", "+", "X"];
        self::assertGreaterThan(0, \count($valuesInArray));
        foreach ($valuesInArray as $value) {
            self::assertTrue(\in_array($value, \str_split($result)));
        }
    }

    /**
     * Data provider for a valid figure generation test
     */
    public function validSizesDataProvider() : array {
        return [
          [5],
          [3],
          [10]
        ];
    }
}
