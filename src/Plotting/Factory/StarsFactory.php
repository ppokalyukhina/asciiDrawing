<?php

namespace Plotting;

use Plotting\Figures\LargeSizeStars;
use Plotting\Figures\SmallSizeStars;

/**
 * Creates a new Implementation of a Star depending on the size.
 */
final class StarsFactory {
    public static function createStarsObject(int $lines): FigurePlotting {
        if ($lines > 9) {
            return new LargeSizeStars();
        }

        return new SmallSizeStars();
    }
}
