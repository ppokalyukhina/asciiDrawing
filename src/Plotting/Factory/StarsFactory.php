<?php

namespace Plotting;

use Plotting\Christmas\BigSizeStars;
use Plotting\Christmas\SmallSizeStars;

final class StarsFactory {
    public static function createStarsObject(int $lines): string {
        if ($lines > 9) {
            $bigStars = new BigSizeStars();
            return $bigStars->generate($lines);
        }

        $smallStars = new SmallSizeStars();
        return $smallStars->generate($lines);
    }
}
