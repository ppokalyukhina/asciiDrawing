<?php

namespace Plotting\Figures;

use Plotting\FigurePlotting;
use Plotting\FigurePlottingHelper;

/**
 * Creates a star figure with a given size.
 */
abstract class Stars extends FigurePlottingHelper implements FigurePlotting {

    protected function generateTopHalf(int $lines, int $medianBase, int $startCount) : array {
        $medianSpace = 0; //Space left when median is equal to number of iterations.
        $medianStars = 0; //Max amount of stars used in the figure.
        $count = 1;
        $result = '';
        for ($x = $startCount, $spaces = $lines; $x <= $lines * 2; $spaces-=2, $x+=4) {
            if ($count === $this->calculateMedian($medianBase)) {
                $result .= "{$this->addSpaces($spaces-1)}+{$this->addXvalueToString($x)}+\n";
                break;
            }

            $result .= "{$this->addSpaces($spaces)}{$this->addXvalueToString($x)}\n";
            $count++;

            $medianSpace = $spaces;
            $medianStars = $x;
        }

        return [
            'result' => $result,
            'medianSpace' => $medianSpace,
            'medianStars' => $medianStars
        ];
    }

    protected function generateBottomHalf(int $medianSpace, int $medianStars) {
        $spaceLeft = 0;
        $result = '';
        for ($spaces = $medianSpace, $x = $medianStars; $x > 0; $x-=4, $spaces+=2) {
            $result .= "{$this->addSpaces($spaces)}{$this->addXvalueToString($x)}\n";

            //When looping is over, keep the value of spaces left so + and last X can be added and be aligned with the rest of the generated figure.
            $spaceLeft = $spaces;
        }

        return [
          'result' => $result,
          'spacesLeft' => $spaceLeft
        ];
    }

    protected function addSpaces(int $limit) : string {
        return $this->generateRepeatedValue(FigurePlotting::SPACE_STRING, $limit);
    }

    private function addXvalueToString(int $limit) : string {
        return $this->generateRepeatedValue(FigurePlotting::X_STRING, $limit);
    }
}
