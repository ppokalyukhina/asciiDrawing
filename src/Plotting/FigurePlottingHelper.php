<?php

namespace Plotting;

abstract class FigurePlottingHelper {
    protected function addSpaces(int $limit) {
        return \str_repeat(FigurePlotting::SPACE_STRING, $limit);
    }

    protected function addXstring(int $limit) {
        return \str_repeat(FigurePlotting::X_STRING, $limit);
    }

    protected function calculateMedian(int $originalNumber) {
        return $median = ($originalNumber + 1) / 2;
    }
}
