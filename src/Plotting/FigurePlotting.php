<?php

namespace Plotting;

interface FigurePlotting {
    // Values
    const CROSS_STRING = "+";
    const X_STRING = "X";
    const SPACE_STRING = " ";

    // Sizes
    const LARGE_SIZE = 11;
    const MEDIUM_SIZE = 7;
    const SMALL_SIZE = 5;

    /**
     * @return string A generated figure ready for printing.
     */
    public function generate(int $lines) : string;
}
