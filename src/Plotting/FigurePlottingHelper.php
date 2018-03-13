<?php

namespace Plotting;

abstract class FigurePlottingHelper {
    protected function addSpaces(int $limit) : string {
        return \str_repeat(FigurePlotting::SPACE_STRING, $limit);
    }

    protected function addXstring(int $limit) {
        return \str_repeat(FigurePlotting::X_STRING, $limit);
    }

    protected function calculateMedian(int $originalNumber) : int {
        return $originalNumber / 2;
    }
}
