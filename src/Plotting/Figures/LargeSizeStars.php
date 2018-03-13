<?php

namespace Plotting\Figures;

use Plotting\FigurePlotting;

final class LargeSizeStars extends Stars {
    /** @inheritdoc */
    public function generate(int $lines = 11) : string {
        if (!($lines & 1) || $lines < 9) {
            throw new \InvalidArgumentException("Desired number of lines should be odd and bigger than 11.");
        }

        $startingColumn = $this->addSpaces($lines + 1);

        $result = $startingColumn . FigurePlotting::CROSS_STRING . "\n";
        $result.= $startingColumn . FigurePlotting::X_STRING . "\n";

        $firstLoopResult = $this->generateTopHalf($lines, $lines-2, 3);
        $result .= $firstLoopResult['result'];

        $bottomPart = $this->generateBottomHalf($firstLoopResult['medianSpace'], $firstLoopResult['medianStars']);
        $result .= $bottomPart['result'];

        $additionalSpaces = $this->addSpaces($bottomPart['spacesLeft'] + 1);

        $result .= "{$additionalSpaces}X\n";
        $result .= "{$additionalSpaces}+";

        return $result;
    }
}
