<?php

namespace Plotting\Figures;

use Plotting\FigurePlotting;
use Plotting\FigurePlottingHelper;

final class ChristmasTree extends FigurePlottingHelper implements FigurePlotting {
    /** @inheritdoc */
    public function generate(int $lines): string {
        if ($lines < 3) {
            throw new \InvalidArgumentException("Given number of lines must be minimum 3.");
        }

        $initialSpaces = $this->generateRepeatedValue(FigurePlotting::SPACE_STRING, $lines);
        $treeString = "{$initialSpaces}+\n";

        for ($spaces=$lines, $x = 1; $x < $lines * 2; $spaces--, $x+=2) {
            $space = $this->generateRepeatedValue(FigurePlotting::SPACE_STRING, $spaces);
            $xString = $this->generateRepeatedValue(FigurePlotting::X_STRING, $x);

            $treeString .= "{$space}{$xString}\n";
        }

        return $treeString;
    }
}
