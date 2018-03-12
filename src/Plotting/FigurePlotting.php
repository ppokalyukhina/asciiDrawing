<?php

namespace Plotting;

interface FigurePlotting {
    public const CROSS_STRING = "+";
    public const X_STRING = "X";
    public const SPACE_STRING = " ";

    /**
     * @return string A figure for printing.
     */
    public function generate(int $lines) : string;
}
