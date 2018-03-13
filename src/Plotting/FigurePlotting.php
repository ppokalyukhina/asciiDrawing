<?php

namespace Plotting;

interface FigurePlotting {
    const CROSS_STRING = "+";
    const X_STRING = "X";
    const SPACE_STRING = " ";

    /**
     * @return string A figure for printing.
     */
    public function generate(int $lines) : string;
}
