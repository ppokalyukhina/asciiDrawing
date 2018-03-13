<?php

namespace Plotting;

use PHPUnit\Framework\TestCase;
use Plotting\Figures\LargeSizeStars;
use Plotting\Figures\SmallSizeStars;

final class StarsFactoryTest extends TestCase {
    /**
     * @testdox If size is < 11, return small/Medium implementation of Stars, else return largeSize implementation.
     *
     * @dataProvider starsFactoryDataProvider
     */
    public static function testCreateStarsObject(
        int $size,
        string $expectedInstance
    ) {
        $starsClassInstance = StarsFactory::createStarsObject($size);

        self::assertInstanceOf($expectedInstance, $starsClassInstance);
    }

    public function starsFactoryDataProvider() {
        return [
          [5, SmallSizeStars::class],
          [7, SmallSizeStars::class],
          [11, LargeSizeStars::class]
        ];
    }
}
