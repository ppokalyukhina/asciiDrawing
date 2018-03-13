<?php

namespace Plotting\Christmas;

use Plotting\FigurePlotting;

final class SmallSizeStars extends Stars {
    /** @inheritdoc */
    public function generate(int $lines = 7) : string {
        if (!($lines & 1) || $lines <= 3) {
            throw new \InvalidArgumentException("Desired number of lines should be an odd number and it must be bigger than 3");
        }

        $initialSpaces = $this->addSpaces($lines);
        $result = $initialSpaces . FigurePlotting::CROSS_STRING . "\n";

        $firstLoopResult = $this->generateTopHalf($lines, $lines-1, 1);
        $result .= $firstLoopResult['result'];

        $bottomPart = $this->generateBottomHalf($firstLoopResult['medianSpace'], $firstLoopResult['medianStars']);
        $result .= $bottomPart['result'];
        $result .= "{$this->addSpaces($bottomPart['spacesLeft'])}+";

        return $result;
    }
}
