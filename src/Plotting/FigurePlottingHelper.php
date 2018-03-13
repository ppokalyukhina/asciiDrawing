<?php

namespace Plotting;

abstract class FigurePlottingHelper {
    protected function generateRepeatedValue(string $value, int $limit) {
        return \str_repeat($value, $limit);
    }

    protected function calculateMedian(int $originalNumber) : int {
        return $originalNumber / 2;
    }
}
